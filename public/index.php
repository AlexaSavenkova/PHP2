<?php

//Создаем псевдонимы классам
use app\models\{Products, Users, Basket, Orders};
use app\engine\Db;
use app\models\figures\{Circle, Rectangle, Triangle};


//Подключаем автозагрузчик
include "../engine/Autoload.php";

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);


//работаем с объектами

$product = new Products(Db::getDbInstance());

$users = new Users(Db::getDbInstance());

$basket = new Basket(Db::getDbInstance());

$order = new Orders(Db::getDbInstance());


echo $product->getOne(2);
echo $product->getAll();

echo $users->getOne(1);
echo $users->getAll();

echo $basket->getAll();
echo $order->getOne(4);

//  проверяем работу класса Figure

echo "<br> проверяем работу класса Figure <br><br>";

$rectangle = new Rectangle(2,5);
echo $rectangle->GetInfo() . "<br>";
echo "Периметр: ". $rectangle->GetPerimeter() . "<br>";
echo "Площадь: ". $rectangle->GetArea() . "<br><br>";

$circle = new Circle(8);
echo $circle->GetInfo() . "<br>";
echo "Периметр: " . $circle->GetPerimeter() . "<br>";
echo "Площадь: " . $circle->GetArea() . "<br><br>";

$triangle = new Triangle(6,13,45);
echo $triangle->GetInfo() . "<br>";
echo "Периметр: " . $triangle->GetPerimeter() . "<br>";
echo "Площадь: " . $triangle->GetArea() . "<br><br>";
