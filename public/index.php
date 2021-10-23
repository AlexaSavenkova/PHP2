<?php

//Создаем псевдонимы классам
use app\engine\{Autoload, Db};
use app\models\{Product, User, Basket, Order};
use app\models\figures\{Circle, Rectangle, Triangle};

//Подключаем автозагрузчик и конфиг
include "../config/config.php";
include "../engine/Autoload.php";

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);


//проверяем insert / delete
$product1 = new Product("Кофе", "Nescafe",180);
$product2 = new Product("Кофе", "Lavazza",200);
$product1->insert();
$product2->insert();
var_dump($product1->getAll());
$product2->delete();
var_dump($product1->getAll());



// проверяем работу с объектами
$user = (new User())->getOneObject(1);
var_dump($user); // получили объект 

$product = (new Product())->getOneObject(2);
var_dump($product);                 
var_dump($product->getAll()); // методы тоже работают


//  проверяем работу класса Figure

echo "<br> проверяем работу класса Figure <br><br>";

$rectangle = new Rectangle(2,5);
$rectangle->showInfo();
$rectangle->side1 = 3;
$rectangle->showInfo();


$circle = new Circle(8);
$circle->showInfo();


$triangle = new Triangle(6,13,45);
$triangle->showInfo();

