<?php

// Добавьте метод andWhere в класс Db, который обеспечит реализацию цепочеки:

// echo $db->table('product')->where('name', 'Alex')->where('session', 123)->andWhere('id', 5)->get();
// что должно вывести SELECT * FROM product WHERE name = Alex AND session = 123 AND id = 5



class Db 
{
    protected $tableName;
    protected $where = [];

    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function get()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        if (!empty($this->where)) {
            $sql .= " WHERE ";
            foreach ($this->where as $value) {
                $sql .= $value['logicalOperator'] . $value['field'] . " = " . $value['value'];
            }
        }

        // очищаем свойства объекта для следующих запросов
        $this->where =[]; 
        $this->tableName = null;

        return $sql;
    }

    private function setWhereArray ($logicalOperator, $field, $value)
    {
        $this->where[] = [
            'logicalOperator' => $logicalOperator,
            'field' => $field,
            'value' => $value
        ];    
    }

    public function where($field, $value)
    {
        $this->setWhereArray('', $field, $value);
        return $this;
    }

    public function andWhere($field, $value)
    {
        $this->setWhereArray(' AND ', $field, $value);
        return $this;
    }

    public function orWhere($field, $value)
    {
        $this->setWhereArray(' OR ', $field, $value);
        return $this;
    }
}

$db = new Db();

echo $db->table('product')->where('name', 'Alex')->get();
echo "<br>";
echo $db->table('product')->where('name', 'Alex')->andWhere('session', 123)->andWhere('id', 5)->get();
echo "<br>";
echo $db->table('goods')->where('name', 'Flor')->orWhere('session', 123)->get();
echo "<br>";

