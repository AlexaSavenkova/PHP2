<?php

namespace app\models;

use app\engine\Db;

abstract class DbModel extends Model
{

    abstract static protected function getTableName();

    public static function getLimit($limit)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);
    }

    public static function getWhere($name, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :{$name}";
        return Db::getInstance()->queryOneObject($sql, [$name => $value], static::class); // возвращает объект
    }

    //CRUD Active Record

    private function insert()
    {
        $params = [];
        $fields = [];
        $values = [];
        foreach ($this->props as $key => $value) {
            $params[$key] = $this->$key;
            $fields[] = $key;
            $values[] = ':' . $key;
        }
        $fields = implode(', ', $fields);
        $values = implode(', ', $values);
        $tableName = static::getTableName();

        $sql = "INSERT INTO {$tableName} ({$fields}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }


    private function update()
    {
        $params = ['id' => $this->id];
        $fields = [];
        foreach ($this->props as $key => $value) {
            if ($value) {
                $params[$key] = $this->$key;
                $fields[] = $key . ' = :' . $key;
                $this->props[$key] = false;
            }
        }
        $fields = implode(', ', $fields);
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET {$fields} WHERE id = :id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }

    public function save()
    {
        return is_null($this->id) ? $this->insert() : $this->update();
    }

    public function delete()
    {
        if (is_null($this->id)) return 0;
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
        // возвращает кол-во затронутых записей 
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        // return Db::getInstance()->queryOne($sql, ['id'=> $id]); // возвращает ассоциативный массив
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class); // возвращает объект
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }
}
