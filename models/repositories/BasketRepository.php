<?php

namespace app\models\repositories;

use app\models\Repository;
use app\engine\Db;
use app\models\entity\Basket;

class BasketRepository extends Repository
{
    public function getBasket($session_id)
    {
        $sql = "SELECT basket.id basket_id, products.id product_id, name, description, price, quantity
        FROM basket JOIN products  ON basket.product_id = products.id WHERE session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    public function getProductInBasket($session_id, $product_id)
    {
        $sql = "SELECT quantity
        FROM basket  WHERE session_id = :session_id AND product_id = :product_id";
        return Db::getInstance()->queryOneObject($sql, ['session_id' => $session_id, 'product_id' => $product_id], Basket::class);
    }

    protected function getTableName()
    {
        return 'basket';
    }

    protected function getEntityClass()
    {
        return Basket::class;
    }
    
}