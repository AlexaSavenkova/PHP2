<?php

namespace app\controllers;

use app\interfaces\IRender;
use app\models\repositories\UserRepository;
use app\models\repositories\BasketRepository;

abstract class Controller 
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    private $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;   
    }

    public function runAction($action)
    {
        $this->action = $action ?? $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            throw new \Exception("Fucnction  {$method} doesn't exist in class " . static::class, 404);
        }
    }


    public function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate('layouts/' . $this->layout, [
                'menu' => $this->renderTemplate('menu', [
                    'isAuth' => (new UserRepository())->isAuth(),
                    'username' => (new UserRepository())->getName(),
                    'count' => (new BasketRepository())->getCountWhere('session_id', session_id()),
                ]),
                'content' => $this->renderTemplate($template, $params),
                
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params)
    {
        return $this->render->renderTemplate($template, $params);
    }

}