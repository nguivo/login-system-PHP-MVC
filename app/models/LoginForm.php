<?php

namespace framework\app\models;

use framework\core\Application;
use framework\core\db\DbModel;

class LoginForm extends DbModel
{
    public string $username = '';
    public string $pwd = '';

    public function tableName(): string
    {
        return 'users';
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public function attributes(): array
    {
        return ['username', 'pwd'];
    }

    public function labels(): array
    {
        return [
            'username' => 'Username',
            'pwd' => 'Password'
        ];
    }

    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'pwd' => [self::RULE_REQUIRED]
        ];
    }

    public function login(): bool
    {
        //implement login logic
        $user = Application::$app->user->findOne(['username' => $this->username]);
        if(!$user) {
            $user = Application::$app->user->findOne(['email' => $this->username]);
        }
        if(!$user) {
            $user = Application::$app->user->findOne(['phone' => $this->username]);

        }

        if($user) {
            if(password_verify($this->pwd, $user->pwd)) {
                Application::$app->user = $user;
                return true;
            }
            else {
                $this->addError('username', 'Login credentials incorrect');
                return false;
            }
        }
        else {
            $this->addError('username', 'User doesn\'t exist');
            return false;
        }
    }
}