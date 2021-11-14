<?php

namespace app\models\repositories;
use app\engine\App;
use app\models\Repository;
use app\models\entity\Product;

class ProductRepository extends Repository
{
    public function getProductPrice($id)
    {
        $sql = "SELECT price FROM products WHERE id = :id";
        return App::call()->db->queryOne($sql, ['id' => $id])['price'];
    }
    protected function getTableName()
    {
        return 'products';
    }

    protected function getEntityClass()
    {
        return Product::class;
    }

}