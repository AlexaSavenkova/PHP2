<?php

namespace app\controllers;

use app\engine\Request;
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
        // $page = $_GET['page'] ?? 0;
        $page = (new Request())->getParams()['page'] ?? 0;

        $catalog = Product::getLimit(($page + 1) * 3); 

        echo $this->render('product/catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = Product::getOne($id);

    // здесь передаем объект product. геттер не отдаст поле id , а нам нужно его использовать, чтобы работала кнопка купить 
    // поэтому нужно либо получать $product как мпссив или пердавать id в params 
        echo $this->render('product/card', [
            'product' => $product,
            'id' => $id   
        ]);
    }

    
}