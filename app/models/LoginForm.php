<?php

namespace app\models;

use framework\core\Application;
use framework\core\db\DbModel;

class LoginForm extends DbModel
{
    public string $username = '';
    public string $adm_pwd = '';

    public function tableName(): string
    {
        return 'telc_admin';
    }

    public function primaryKey(): string
    {
        return "adm_id";
    }

    public function attributes(): array
    {
        return ['username', 'adm_pwd'];
    }

    public function labels(): array
    {
        return [
            'username' => 'Username',
            'adm_pwd' => 'Password'
        ];
    }

    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'adm_pwd' => [self::RULE_REQUIRED]
        ];
    }

    public function login(): bool
    {
        //implement login logic
        $where = [];

        $where = ['username' => $this->username];
        $user = Application::$app->user->findOne($where);
        //Application::dnd($user);
        if($user) {
            if(password_verify($this->adm_pwd, $user->adm_pwd)) {
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