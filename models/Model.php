<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    protected $props = [];

    public function __set($name, $value) 
    {
        if (isset($this->props[$name])) {
            $this->$name = $value;
            $this->props[$name] = true;
        }
    }

    public function __get($name) {
        //TODO отдавать только существующие поля проверить по props
        if (isset($this->props[$name])){
            return $this->$name;
        }
    }

    public function __isset($name)
    {
        return isset($this->name);
    }
   
}