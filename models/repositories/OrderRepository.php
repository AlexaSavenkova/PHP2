<?php

namespace app\models\repositories;
use app\engine\App;
use app\models\Repository;
use app\models\entity\Order;

class OrderRepository extends Repository
{
    protected function getTableName()
    {
        return 'orders';
    }

    protected function getEntityClass()
    {
        return Order::class;
    }

    public function getOrders()
    {
        $sql = "SELECT id, name, phone FROM {$this->getTableName()} ORDER BY id DESC";
        return App::call()->db->queryAll($sql);
    }
    public function getOneOrder($order_id)
    {
        // TODO для админки
    }
}