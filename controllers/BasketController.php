<?php

namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{

    public function actionIndex() 
    {
        $basket = Basket::getBasket('111'); // получаем корзину по session_id
        echo $this->render('basket', ['basket' => $basket]);
    }
}