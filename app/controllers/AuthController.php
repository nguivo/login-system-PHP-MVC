<?php

namespace framework\app\controllers;

use app\models\User;
use app\models\LoginForm;
use framework\core\Application;
use framework\core\Controller;
use framework\core\middlewares\AuthMiddleware;
use framework\core\Request;
use framework\core\Response;

class AuthController extends Controller
{
    public string $layout = 'main2';

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile', 'dashboard']));
    }


    public function login(Request $request): string|bool
    {
        $this->layout = "main";
        $loginForm = new LoginForm();

        if($request->isPost()) {
            $loginForm->loadData($request->getRequestBody());
            if($loginForm->validate() && $loginForm->login()) {
                Application::$app->session->setFlash('success', 'Welcome Boss');
                Application::$app->login();
                return true;
            }
        }
        return $this->render('/login', ['model' => $loginForm]);
    }


    public function register(Request $request): string
    {
        $this->setLayout("main");
        $user = new User();

        if($request->isPost()) {
            $user->loadData($request->getRequestBody());
            if($user->validate() && $adm_id = $user->register()) {
                Application::$app->session->setFlash('success', "Successfully registered");
                return $this->render("/complete-registration", ['model' => $user, 'adm_id' => $adm_id]);
            }

            return $this->render("register", ['model' => $user]);
        }

        return $this->render('register', ['model' => $user]);
    }
    
    
    public function resultOverview(Request $request): string
    {
        $this->setLayout("main2");
        if(Application::$app->session->get('reference')) {
            $params = [
                'name' => 'IELTS Results'    
            ];
            return $this->render('/result-overview', $params);
        }
        return $this->render('/check-test-results');
    }


    public function results(): string
    {
        $this->setLayout("main2");
        if(Application::$app->session->get('reference')) {
            $params = [
                'name' => 'Detailed Results'
            ];
            return $this->render('/results', $params);
        }
        return $this->render('/check-test-results');
    }


    public function dashboard(): string
    {
        $this->setLayout('dash');
        Application::$app->view->title = "Dashboard";
        return $this->render('/dashboard');
    }


    public function profile(): string
    {
        Application::$app->view->title = "User Profile";
        return $this->render('profile');
    }


    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        Application::$app->response->redirect('login');
    }

}