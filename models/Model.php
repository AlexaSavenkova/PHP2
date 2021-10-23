<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
       return $this->$name;
    }

    abstract public function getTableName();

    //CRUD Active Record

    public function insert()
    {
        $params =[];
        $fields =[];
        $values =[];
        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $params[$key] = $value;  
            $fields[] = $key;
            $values[] = ':' . $key;  
        }
        $fields = implode(', ', $fields);
        $values = implode(', ', $values);
        $tableName = $this->getTableName();

        $sql = "INSERT INTO {$tableName} ({$fields}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }


    public function delete()
    {
        $id = $this->id;
        $params = ['id'=>$id];
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, $params); 
        // возвращает кол-во затронутых записей 
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id'=> $id]);

    }

    public function getOneObject($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        // return Db::getInstance()->queryOne($sql, ['id' => $id]);

        //TODO вернуть объект а не массив, объект с методами!
        // return $this->db->queryOneObject($sql, ['id' => $id], get_called_class());
      
        return Db::getInstance()->queryOneObject($sql, ['id'=> $id], static::class);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }
}