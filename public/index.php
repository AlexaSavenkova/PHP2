<?php
session_start();

//Создаем псевдонимы классам
use app\engine\{Autoload, Render, Request, TwigRender};

//Подключаем автозагрузчик и конфиг
include "../config/config.php";
require_once '../vendor/autoload.php';

//include "../engine/Autoload.php";
//регистрируем наш автозагрузчик
//spl_autoload_register([new Autoload(), 'loadClass']);

try {
    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        // $controller = new $controllerClass(new TwigRender());
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    } else {
        throw new \Exception("Нет контроллера {$controllerClass}.php", 404);
    }
} catch (\PDOException $e) {
    var_dump($e);
} catch (\Exception $e) {
    var_dump($e);
}
