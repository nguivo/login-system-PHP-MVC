<?php

use framework\app\controllers\AuthController;
use framework\app\controllers\SiteController;
use framework\app\models\User;
use framework\core\Application;
use Dotenv\Dotenv;

$path = dirname(__DIR__);
require_once $path."/vendor/autoload.php";
$dotenv = Dotenv::createImmutable($path);
$dotenv->load();

$config = [
    'userClass'  => User::class,
    'db' => [
        'dsn' => "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",
        'user' => $_ENV['DB_USER'],
        'pass' => $_ENV['DB_PASS']
    ],
    'siteInfo' => [
        'name' => $_ENV['SITE_NAME'],
        'alias' => $_ENV['SITE_ALIAS'],
        'url' => $_ENV['SITE_URL'],
        'email' => $_ENV['SITE_EMAIL'],
        'default_email' => $_ENV['SITE_DEFAULT'],
        'mailer_email' => $_ENV['SITE_MAILER'],
        'tel' => $_ENV['SITE_TEL'],
        'addr' => $_ENV['SITE_ADDR'],
    ]
];

$app = new Application($path, $config);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->post('/', [SiteController::class, 'home']);

$app->router->get('/home', [SiteController::class, 'home']);
$app->router->post('/home', [SiteController::class, 'home']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->post('/logout', [AuthController::class, 'logout']);


$app->run();
