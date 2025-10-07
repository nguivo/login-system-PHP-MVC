<?php

namespace app\models;

use framework\core\Application;
use framework\core\db\DbModel;
use framework\core\Token;
use framework\core\UserModel;

class User extends UserModel
{
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_SUSPENDED = 'suspended';
    public const STATUS_DELETED = 'deleted';

    public int $id;
    public string $first_name = '';
    public string $last_name = '';
    public string $username = '';
    public string $dob = '';
    public string $email = '';
    public string $pwd = '';


    public function rules(): array
    {
        return[
            'username' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 50], [self::RULE_UNIQUE, 'class' => self::class]],
            'adm_pwd' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6]]
        ];
    }


    public function labels(): array
    {
        return [
            'username' => 'Username',
            'adm_pwd' => 'Password'
        ];
    }


    public function tableName(): string
    {
        return "users";
    }


    public function attributes(): array
    {
        return ['username', 'adm_pwd'];
    }


    public function primaryKey(): string
    {
        return "adm_id";
    }


    public function register()
    {
        $temp_pass = $this->adm_pwd;
        $this->adm_pwd = password_hash($this->adm_pwd, PASSWORD_DEFAULT);

        /* Starting registration transaction */
        try {
            if($this->adm_id = $this->save()) {
                return $this->adm_id;
            }
        }
        catch (\PDOException $e) {
            $this->adm_pwd = $temp_pass;
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