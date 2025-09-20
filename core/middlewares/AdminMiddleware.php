<?php

namespace framework\core\middlewares;

use framework\core\Application;
use framework\core\exceptions\ForbiddenException;

class AdminMiddleware extends BaseMiddleware
{
    public array $action = [];

    public function __construct(array $action)
    {
        $this->action = $action;
    }


    /**
     * @throws ForbiddenException
     */
    public function execute(): void
    {
        if(Application::isGuest()) {
            if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}