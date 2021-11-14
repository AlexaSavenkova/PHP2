<?php

namespace app\models\repositories;

use app\models\Repository;
use app\engine\App;
use app\models\entity\Basket;

class BasketRepository extends Repository
{
    public function getBasket($session_id)
    {
        $sql = "SELECT basket.id basket_id, products.id product_id, name, description, basket.price price, quantity
        FROM basket JOIN products  ON basket.product_id = products.id WHERE session_id = :session_id";
        return App::call()->db->queryAll($sql, ['session_id' => $session_id]);
    }
    public function getBasketSum($session_id)
    {
        $sql = "SELECT SUM(price * quantity) as sum FROM `basket` WHERE session_id = :session_id";
        return App::call()->db->queryOne($sql, ['session_id' => $session_id])['sum'];
    }
    public function getProductInBasket($session_id, $product_id)
    {
        $sql = "SELECT quantity
        FROM basket  WHERE session_id = :session_id AND product_id = :product_id";
        return App::call()->db->queryOneObject($sql, ['session_id' => $session_id, 'product_id' => $product_id], Basket::class);
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