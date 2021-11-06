<?php
session_start();

//Создаем псевдонимы классам
use app\engine\{Autoload, Render, Request,TwigRender};
use app\models\Product;

//Подключаем автозагрузчик и конфиг
include "../config/config.php";
include "../engine/Autoload.php";

//регистрируем наш автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);

// подключаем twig
require_once '../vendor/autoload.php';

$request = new Request();


$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
   // $controller = new $controllerClass(new TwigRender());
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    die("Нет контроллера {$controllerClass}.php");
}

