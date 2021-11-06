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
        'product_id' => false,
        'session_id' => false,
        'quantity' => false
    ];

    public function __construct($session_id = null, $product_id = null, $quantity = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }
    

    public static function getBasket($session_id)
    {
        $sql = "SELECT basket.id basket_id, products.id product_id, name, description, price, quantity
        FROM basket JOIN products  ON basket.product_id = products.id WHERE session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    public static function getProductInBasket($session_id, $product_id)
    {
        $sql = "SELECT quantity
        FROM basket  WHERE session_id = :session_id AND product_id = :product_id";
        return Db::getInstance()->queryOneObject($sql, ['session_id' => $session_id, 'product_id' => $product_id], Basket::class);
    }

    protected static function getTableName()
    {
        return 'basket';
    }    
}