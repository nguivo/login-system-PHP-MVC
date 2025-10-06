<?php

namespace framework\app\controllers;

use framework\core\Application;
use framework\core\Controller;
use framework\core\Request;
use framework\core\Response;

class SiteController extends Controller
{
    public function home(): string
    {
        $params = [
            'name' => 'Home'
        ];
        return $this->render('/home', $params);
    }


    public function privacy()
    {
        $params = [
            'name' => 'Privacy and Terms and Conditions of Use'
        ];
        return $this->render('privacy-terms', $params);
    }


}
