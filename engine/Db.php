<?php

namespace app\engine;

class Db
{
    private static $db = NULL;

    static public function getDbInstance()
    {
        if (static::$db === NULL)
        {
            static::$db = new Db();
            echo "created new instance of Db <br>";
        }
        return static::$db;
    }

    //SELECT from users where id = 1
    public function queryOne($sql)
    {
        return $sql . "<br>";
    }

    //SELECT from users
    public function queryAll($sql)
    {
        return $sql . "<br>";
    }
}