<?php

namespace framework\app\models;

use framework\core\Application;
use framework\core\db\DbModel;
use framework\core\Token;
use framework\core\UserModel;

class User extends UserModel
{
    public int $id;
    public string $first_name = '';
    public string $last_name = '';
    public string $dob = '';
    public string $username = '';
    public string $email = '';
    public string $pwd = '';

    public string $cpwd = '';

    public string $timezone = '';
    public string $created_at = '';
    public string $updated_at = '';

    public function rules(): array
    {
        return[
            'first_name' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3]],
            'last_name' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3]],
            'dob' => [self::RULE_REQUIRED],
            'username' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 50], [self::RULE_UNIQUE, 'class' => self::class]],
            'email' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            'pwd' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6]],
            'cpwd' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'pwd']]
        ];
    }


    public function labels(): array
    {
        return [
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'dob' => 'Date of birth',
            'username' => 'Username',
            'email' => 'Email',
            'pwd' => 'Password',
            'cpwd' => 'Confirm password',
            'rem' => 'Remember Me'
        ];
    }


    public function tableName(): string
    {
        return "users";
    }


    public function attributes(): array
    {
        return ['username', 'email', 'pwd', 'timezone', 'created_at', 'updated_at'];
    }


    public function primaryKey(): string
    {
        return "id";
    }


    public function register(): int|bool
    {
        $temp_pass = $this->pwd;
        $this->pwd = password_hash($this->pwd, PASSWORD_DEFAULT);
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');

        /* Starting registration transaction */
        try {
            if($this->id = $this->save()) {
                return $this->id;
            }
        }
        catch (\PDOException $e) {
            $this->pwd = $temp_pass;
            //Application::dnd($e);
            return false;
        }
        return false;
    }


    public function getDisplayName(): string
    {
        return $this->username;
    }

}