<?php

namespace app\models;
use app\engine\Db;


class Basket extends DbModel
{
    protected $id;
    protected $product_id;
    protected $session_id;
    protected $quantity;

    protected $props = [
        'roduct_id' => false,
        'session_id' => false,
        'quantity' => false
    ];

    public static function getBasket($session_id)
    {
        $sql = "SELECT basket.id basket_id, products.id product_id, name, description, price, quantity
        FROM basket JOIN products  ON basket.product_id = products.id WHERE session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    protected static function getTableName()
    {
        return 'basket';
    }    
}