<?php

namespace app\models;

class Basket extends Model
{
    public $id;
    public $goods_id;
    public $session_id;

    public function __construct($goods_id = null, $session_id = null)
    {
        $this->goods_id = $goods_id;
        $this->session_id = $session_id;
    }

    public function getTableName()
    {
        return 'basket';
    }    
}