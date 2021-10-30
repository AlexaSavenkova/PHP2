<?php

//Создаем псевдонимы классам
use app\engine\{Autoload, Db};
use app\models\{Product, User, Basket, Order};

//Подключаем автозагрузчик и конфиг
include "../config/config.php";
include "../engine/Autoload.php";

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?? 'product';
$actionName = $_GET['a'] ?? null;

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    die("Нет контроллера {$controllerClass}.php");
}

die();

// проверяем работу save()

// $product = Product::getWhere('name', 'Чай');
// $product->price = 100;  
// $product->description = 'Royal Blend';  
// var_dump($product);    
// $product->save();
// var_dump($product); // все props теперь false   
// $product = new Product("Кофе", "Nescafe", 180);
// var_dump($product);
// $product->save();
// var_dump(Product::getAll());
