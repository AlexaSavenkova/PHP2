<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    

    public function actionIndex()
    {

        echo $this->render('index');
    }

    public function actionCatalog()
    {
        // $catalog = Product::getAll();
        // $page = $_GET['page'] ?? 0;
        $page = (new Request())->getParams()['page'] ?? 0;

        $catalog = (new ProductRepository())->getLimit(($page + 1) * 3); 

        echo $this->render('product/catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = (new ProductRepository())->getOne($id);


        echo $this->render('product/card', [
            'product' => $product
        ]);
    }

    
}