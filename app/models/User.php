<?php

namespace framework\app\models;

use framework\core\Application;
use framework\core\db\DbModel;
use framework\core\Token;
use framework\core\UserModel;

class User extends UserModel
{
    public int $id;
    public int $email_verified = 0;
    public string $email = '';
    public string $pwd = '';
    public string $username = '';
    public string $status = '';
    public string $phone = '';
    public string $timezone = '';
    public string $created_at = '';
    public string $updated_at = '';
    public string $last_login_at = '';
    public string $last_login_ip = '';

    public function tableName(): string
    {
        return "users";
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public function attributes(): array
    {
        return ['email', 'pwd', 'username', 'status', 'phone', 'timezone', 'created_at', 'updated_at', 'last_login_at', 'last_login_ip'];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'pwd' => 'Password',
            'username' => 'Username',
            'status' => 'Status',
            'phone' => 'Phone',
            'timezone' => 'Timezone',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'last_login_at' => 'Last Login At',
            'last_login_ip' => 'Last Login Ip'
        ];
    }

    public function rules(): array
    {
        return [];
    }

    public function getDisplayName(): string
    {
        return $this->username;
    }

}