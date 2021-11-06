<?php

namespace app\controllers;

use app\models\Basket;
use app\engine\Request;

class BasketController extends Controller
{

    public function actionIndex() 
    {
        $session_id = session_id();
        $basket = Basket::getBasket($session_id); // получаем корзину по session_id
        $count = count($basket); // если нет товаров, в шаблоне пишеим корзина пуста
        echo $this->render('basket', ['basket' => $basket, 'count' => $count]);
    }

    public function actionAdd()
    {
        $id = (new Request())->getParams()['id'];
        $session_id = session_id();

        $basket = Basket::getOneWhereAnd(['session_id'=> $session_id, 'product_id' => $id]);
        if (!$basket) {
            $basket = new Basket($session_id, $id, 1);
        } else {
            $basket->quantity ++;
        }
        $basket->save();
        $response = [
            'status' => 'ok',
            'count' => Basket::getCountWhere('session_id', $session_id) // возвращает кол-во наименований товаров
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionDelete() 
    {
        $id = (new Request())->getParams()['id'];
        $session_id = session_id(); 
        $status = 'ok';
        $quantity = 0;
        $basket = Basket::getOne($id);

        if($session_id === $basket->session_id){
            $quantity = --$basket->quantity;
            ($quantity === 0) ? $basket->delete(): $basket->save();
            
        } else {
            $status = 'wrong session_id';
        }
        
        $response = [
            'status' => $status,
            'quantity' => $quantity,
            'count' => Basket::getCountWhere('session_id', $session_id) // возвращает кол-во наименований товаров
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}