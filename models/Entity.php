<?php

namespace app\models;


abstract class Entity
{

    protected $props = [];

    public function setInitialProps() {
        foreach ($this->props as $key => $value) {
            $this->props[$key] = false;
        }
    }

    public function __set($name, $value) 
    { 
        if (isset($this->props[$name])) {
            $this->$name = $value;
            $this->props[$name] = true;
        }
    }

    public function __get($name) {
        // отдает только существующие  поля
        // больше не проверяю по props, так как id может запрашиваться методом из репозитория, а это другой класс

        // if (isset($this->props[$name])){
        //     return $this->$name;
        // }
        if (isset($this->$name)) {
            return $this->$name;
        }
    }

    public function __isset($name)
    {
        return isset($this->name);
    }
   
}