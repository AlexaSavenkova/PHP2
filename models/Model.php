<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    // protected $props = [];

    public function __set($name, $value) {
        $this->$name = $value;
        $this->props[$name] = true;
    }

    public function __get($name) {
       return $this->$name;
    }
   
}