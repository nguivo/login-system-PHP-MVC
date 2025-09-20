<?php

namespace framework\core;
use framework\core\Application;

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

}