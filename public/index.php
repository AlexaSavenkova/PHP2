<?php
session_start();

//Создаем псевдонимы классам
use app\engine\App;

//Подключаем автозагрузчик и конфиг
$config = include "../config/config.php";
require_once '../vendor/autoload.php';


try {

    App::call()->run($config);

} catch (\PDOException $e) {
    var_dump($e);
} catch (\Exception $e) {
    var_dump($e);
}
