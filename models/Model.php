<?php

namespace app\models;

use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected $db;


    public function __construct($db)
    {
        $this->db = $db;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
       return $this->$name;
    }


    abstract public function getTableName();

    //CRUD Active Record

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }
}