<?php

namespace app\models;

use app\engine\App;

abstract class Repository
{

    abstract protected function getTableName();

    abstract protected function getEntityClass(); 

    public function getLimit($limit)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return App::call()->db->queryLimit($sql, $limit);
    }

    public function getOneWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
        return App::call()->db->queryOneObject($sql, ['value' => $value], $this->getEntityClass()); // возвращает объект
    }


    // $params = ['name1' => value1, 'name2' => value2 ...]
    public function getOneWhereAnd(array $params)
    {
        $fields = [];
        foreach ($params as $key => $value) {
            $fields[] = $key. ' = :'. $key;
        }
        $fields = implode(' AND ', $fields);
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$fields}";
    
       return App::call()->db->queryOneObject($sql, $params, $this->getEntityClass()); // возвращает объект
    }

    public function getCountWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT COUNT(id) as count FROM {$tableName} WHERE {$name} = :value";
        return App::call()->db->queryOne($sql, ['value' => $value])['count'];
    }

    //CRUD Active Record

    private function insert(Entity $entity)
    {
        $params = [];
        $fields = [];
        $values = [];
        foreach ($entity->props as $key => $value) {
            $params[$key] = $entity->$key;
            $fields[] = $key;
            $values[] = ':' . $key;
        }
        $fields = implode(', ', $fields);
        $values = implode(', ', $values);
        $tableName = $this->getTableName();

        $sql = "INSERT INTO {$tableName} ({$fields}) VALUES ({$values})";
        App::call()->db->execute($sql, $params);
        $entity->id = App::call()->db->lastInsertId();
       
    }


    private function update(Entity $entity)
    {
        $params = ['id' => $entity->id];
        $fields = [];
        foreach ($entity->props as $key => $value) {
            if ($value) {
                $params[$key] = $entity->$key;
                $fields[] = $key . ' = :' . $key;
                //$entity->props[$key] = false;  // это больше не работает
                // здесь я не знаю как лучше поступить: либо оствить props как есть после обновления в базе 
                // либо сделать props public, тогда можно будет менять из любого класса
                // я сделала в Entity метод setInitialProps(), который все props устанавливает false
            }
        }
        $entity->setInitialProps();
       
        $fields = implode(', ', $fields);
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET {$fields} WHERE id = :id";
        App::call()->db->execute($sql, $params);
    }

    public function save(Entity $entity)
    {
        is_null($entity->id) ? $this->insert($entity) : $this->update($entity);
    }

    public function delete(Entity $entity)
    {
        if (is_null($entity->id)) return 0;
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->execute($sql, ['id' => $entity->id]);
        // возвращает кол-во затронутых записей 
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        // return Db::getInstance()->queryOne($sql, ['id'=> $id]); // возвращает ассоциативный массив
        return App::call()->db->queryOneObject($sql, ['id' => $id], $this->getEntityClass()); // возвращает объект
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql);
    }
}
