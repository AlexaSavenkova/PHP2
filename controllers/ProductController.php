<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    

    public function actionIndex()
    {

        echo $this->render('index');
    }

    public function actionCatalog()
    {
        // $catalog = Product::getAll();
        $page = $_GET['page'] ?? 0;

        $catalog = Product::getLimit(($page + 1) * 2); //2  4 6 8

        echo $this->render('product/catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];

        $product = Product::getOne($id);

        echo $this->render('product/card', [
            'product' => $product
        ]);
    }

    
}