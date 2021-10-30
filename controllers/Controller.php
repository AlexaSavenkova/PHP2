<?php

namespace app\controllers;

abstract class Controller 
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action)
    {
        $this->action = $action ?? $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die("Fucnction  {$method} doesn't exist in class " . static::class);
        }
    }


    public function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate('layouts/' . $this->layout, [
                'menu' => $this->renderTemplate('menu', $params),
                'content' => $this->renderTemplate($template, $params),
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    //$params = ['catalog' => [1,2,3]];
    public function renderTemplate($template, $params)
    {

        ob_start();

        extract($params);

        $templatePath = VIEWS_DIR . $template . ".php";

        include $templatePath;

        return ob_get_clean();
    }
}