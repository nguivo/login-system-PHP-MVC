<?php

namespace framework\app\controllers;

use framework\app\models\User;
use framework\app\models\LoginForm;
use framework\core\Application;
use framework\core\Controller;
use framework\core\middlewares\AuthMiddleware;
use framework\core\Request;
use framework\core\Response;

class AuthController extends Controller
{
    public string $layout = 'main';

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile', 'dashboard']));
    }


    public function register(Request $request): string
    {
        $this->setLayout("main");
        $user = new User();

        if($request->isPost()) {
            $user->loadData($request->getRequestBody());
            if($user->validate() && $user_id = $user->register()) {
                Application::$app->session->setFlash('success', "Successfully registered. Please check your email for activation.");
                return $this->render("/complete-registration", ['model' => $user, 'user_id' => $user_id]);
            }

            return $this->render("register", ['model' => $user]);
        }

        return $this->render('register', ['model' => $user]);
    }


    public function completeRegistration(): string
    {
        $params = [
            'name' => 'Complete Registration'
        ];
        return $this->render('/complete-registration', $params);
    }


    public function login(Request $request): string|bool
    {
        $this->layout = "main";
        $loginForm = new LoginForm();

        if($request->isPost()) {
            $loginForm->loadData($request->getRequestBody());
            if($loginForm->validate() && $loginForm->login()) {
                Application::$app->login();
                //TODO: Redirect user according to their roles
                return $this->render('/home');
            }
        }
        return $this->render('/login', ['model' => $loginForm]);
    }


    public function dashboard(): string
    {
        $this->setLayout('dash');
        Application::$app->view->title = "Dashboard";
        return $this->render('/dashboard');
    }


    public function profile(): string
    {
        Application::$app->view->title = "User UserProfile";
        return $this->render('profile');
    }


    public function logout(Request $request, Response $response): void
    {
        Application::$app->logout();
        Application::$app->response->redirect('login');
    }

}