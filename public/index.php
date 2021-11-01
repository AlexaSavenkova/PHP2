<?php

//Создаем псевдонимы классам
use app\engine\{Autoload, Render, TwigRender};
use app\models\Product;

//Подключаем автозагрузчик и конфиг
include "../config/config.php";
include "../engine/Autoload.php";

//регистрируем наш автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);

// подключаем twig
require_once '../vendor/autoload.php';


$controllerName = $_GET['c'] ?? 'product';
$actionName = $_GET['a'] ?? null;

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
   // $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    die("Нет контроллера {$controllerClass}.php");
}

