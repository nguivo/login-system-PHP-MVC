<?php

namespace framework\app\controllers;

use framework\app\models\RegistrationForm;
use framework\app\models\LoginForm;
use framework\app\models\UserProfile;
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
        $regUser = new  RegistrationForm();

        if($request->isPost()) {
            $regUser->loadData($request->getRequestBody());
            if($regUser->validate() && $user_id = $regUser->register()) {
                // register user
                $userProfile = new UserProfile();
                $userProfile->loadData($request->getRequestBody());
                $userProfile->user_id = $user_id;
                $userProfile->updateProfile();

                // set a registered message
                Application::$app->session->setFlash('success', "Successfully registered. Please check your email for activation.");

                // Send user an email with confirmation code
                $emailCtrl = new EmailController();
                $emailCtrl->sendEmailVerificationMail($user_id);

                return $this->render("/complete-registration", ['model' => $regUser, 'user_id' => $user_id]);
            }

            return $this->render("register", ['model' => $regUser]);
        }

        return $this->render('register', ['model' => $regUser]);
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