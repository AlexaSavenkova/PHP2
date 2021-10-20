<?php

namespace app\models;

class Basket extends Model
{
    public $id;
    public $goods_id;
    public $session_id;

    public function getTableName()
    {
        return 'basket';
    }    
}