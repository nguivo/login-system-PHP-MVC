<?php

namespace framework\core;

use framework\core\db\Database;

class Application
{
    public static string $ROOT_DIR;
    public static string $SITE_NAME;
    public static string $SITE_ALIAS;
    public static string $SITE_URL;
    public static string $SITE_ADDR;
    public static string $SITE_TEL;
    public static string $SITE_OWNER;
    public static string $SITE_EMAIL;
    public static string $SITE_DEFAULT_EMAIL;
    public static string $SITE_MAILER_EMAIL;


    public Session $session;
    public Request $request;
    public Response $response;
    public Router $router;
    public View $view;
    public Controller $controller; //value set in Router class
    public Database $db;
    public string $userClass;
    public ?UserModel $user;

    public static Application $app;


    public function __construct(string $rootPath, array $config)
    {
        $this->db = new Database($config['db']);

        self::$SITE_NAME = $config['siteInfo']['name'];
        self::$SITE_ALIAS = $config['siteInfo']['alias'];
        self::$SITE_URL = $config['siteInfo']['url'];
        self::$SITE_ADDR = $config['siteInfo']['addr'];
        self::$SITE_TEL = $config['siteInfo']['tel'];
        self::$SITE_EMAIL = $config['siteInfo']['email'];
        self::$SITE_DEFAULT_EMAIL = $config['siteInfo']['default_email'];
        self::$SITE_MAILER_EMAIL = $config['siteInfo']['mailer_email'];
        
        /*self::$SITE_OWNER = $config['siteInfo']['owner'];
        self::$SITE_EMAIL = $config['siteInfo']['tcode_pre'];
        self::$SITE_EMAIL = $config['siteInfo']['tcode_suf'];*/

        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->session = new Session();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->userClass = $config['userClass'];

        $this->user = new $this->userClass;

        $primaryValue = $this->session->get('user');

        if($primaryValue) {
            $primaryKey = $this->user->primaryKey();
            $this->user = $this->user->findOne([$primaryKey => $primaryValue]);
        }
    }


    public function run(): void
    {
        try {
            echo $this->router->resolve();
        }
        catch (\Exception $e) {
            //Application::dnd($e->getTrace());
            if(is_int($e->getCode())) $this->response->setResponseCode($e->getCode());
            echo $this->view->renderView('_errors', ['exception' => $e]);
        }
        //echo $this->router->resolve();
    }


    public function login(): bool
    {
        $user = $this->user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        $this->redirectUser();
        return true;
    }


    public function redirectUser()
    {
        if($this->isAdmin()) {
            $this->response->redirect('/admin-dashboard');
        }
        elseif ($this->isUser()) {
            $this->response->redirect('/complete-registration');
        }
        else {
            $this->logout();
            $this->response->redirect('/login');
        }
    }


    public static function isGuest(): bool
    {
        if(!array_key_exists('user', $_SESSION)) {
            return true;
        }
        return false;
    }


    public function isAdmin(): bool
    {
        if($this->session->get('user')) {
            $user = $this->user;
            if($user->status == 1) {
                return true;
            }
        }
        return false;
    }


    public function isUser(): bool
    {
        if(!self::isGuest()) {
            return true;
        }
        return false;
    }


    public function logout(): void
    {
        $this->user = new $this->userClass;
        $this->session->delete('user');
    }


    public static function dnd($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";

        die();
    }


}
