<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\BasketRepository;
use app\models\entity\Basket;

class BasketController extends Controller
{

    public function actionIndex() 
    {
        $session_id = session_id();
        $basket = (new BasketRepository())->getBasket($session_id); // получаем корзину по session_id
        $count = count($basket); // если нет товаров, в шаблоне пишеим корзина пуста
        echo $this->render('basket', ['basket' => $basket, 'count' => $count]);
    }

    public function actionAdd()
    {
        $id = (new Request())->getParams()['id'];
        $session_id = session_id();

        $basket = (new BasketRepository())->getOneWhereAnd(['session_id'=> $session_id, 'product_id' => $id]);
        if (!$basket) {
            $basket = new Basket($session_id, $id, 1);
        } else {
            $basket->quantity ++;
        }
        (new BasketRepository())->save($basket);
        $response = [
            'status' => 'ok',
            'count' => (new BasketRepository())->getCountWhere('session_id', $session_id) // возвращает кол-во наименований товаров
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
        $basket = (new BasketRepository())->getOne($id);

        if($session_id === $basket->session_id){
            $quantity = --$basket->quantity;
            ($quantity === 0) ? (new BasketRepository())->delete($basket): (new BasketRepository())->save($basket);
        } else {
            $status = 'wrong session_id';
        }

        $response = [
            'status' => $status,
            'quantity' => $quantity,
            'count' => (new BasketRepository())->getCountWhere('session_id', $session_id) // возвращает кол-во наименований товаров
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}