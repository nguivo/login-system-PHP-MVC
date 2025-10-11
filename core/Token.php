<?php

namespace framework\core;

class Token
{

    public static function refcodeGen(): int
    {
        $rand = rand(100000, 999999);
        while(Application::$app->user->findOne(['candidate_number' => $rand])) {
            self::refcodeGen();
        }
        return $rand;
    }


    public static function generate(): string
    {
        return bin2hex(random_bytes(16));
    }


    public static function setSecurityToken(): string
    {
        $token = self::generate();
        $_SESSION['token'] = $token;
        return $token;
    }


    public static function checkToken($token): bool
    {
        if(isset($_SESSION['token']) && $token === $_SESSION['token']) {
            unset($_SESSION['token']);
            return true;
        }
        return false;
    }

}