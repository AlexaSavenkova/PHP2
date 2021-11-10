<?php

namespace app\models\repositories;
use app\models\Repository;
use app\models\entity\Product;

class ProductRepository extends Repository
{

    protected function getTableName()
    {
        return 'products';
    }

    protected function getEntityClass()
    {
        return Product::class;
    }

}