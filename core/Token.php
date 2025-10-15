<?php

namespace framework\core;

class Token
{

    public static function referenceCodeGen(): int
    {
        $rand = rand(100000, 999999);
        while(Application::$app->user->findOne(['candidate_number' => $rand])) {
            self::referenceCodeGen();
        }
        return $rand;
    }


    public static function generate(): string
    {
        try {
            $bytes = random_bytes(16);
        } catch (\Exception $e) {
            Application::$app->session->setFlash('error', 'Could not generate security token.');
            die($e->getMessage());
        }
        return bin2hex($bytes);
    }


    public static function setSecurityToken(): string
    {
        $token = self::generate();
        $_SESSION['token'] = $token;
        return $token;
    }


    public static function checkSecurityToken($token): bool
    {
        if(isset($_SESSION['token']) && $token === $_SESSION['token']) {
            unset($_SESSION['token']);
            return true;
        }
        return false;
    }

}