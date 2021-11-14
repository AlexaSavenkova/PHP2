<?php

namespace app\controllers;

use app\engine\App;
use app\models\entity\Basket;

class BasketController extends Controller
{

    public function actionIndex() 
    {
        $session_id = session_id();
        $basket = App::call()->basketRepository->getBasket($session_id); // получаем корзину по session_id
        $count = count($basket); // если нет товаров, в шаблоне пишеим корзина пуста
        $sum = App::call()->basketRepository->getBasketSum($session_id);
        echo $this->render('basket', ['basket' => $basket, 'count' => $count, 'sum' => $sum]);
    }

    public function actionAdd()
    {
        $id = App::call()->request->getParams()['id'];
        $session_id = session_id();
        $price = App::call()->productRepository->getProductPrice($id);

        $basket = App::call()->basketRepository->getOneWhereAnd(['session_id'=> $session_id, 'product_id' => $id]);
        if (!$basket) {
            $basket = new Basket($session_id, $id, 1, $price);
        } else {
            $basket->quantity ++;
        }
        App::call()->basketRepository->save($basket);
        $response = [
            'status' => 'ok',
            'count' => App::call()->basketRepository->getCountWhere('session_id', $session_id)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionDelete() 
    {
        $id = App::call()->request->getParams()['id'];
        $session_id = session_id(); 
        $status = 'ok';
        $quantity = 0;
        $basket = App::call()->basketRepository->getOne($id);

        if($session_id === $basket->session_id){
            $quantity = --$basket->quantity;
            ($quantity === 0) ? App::call()->basketRepository->delete($basket): App::call()->basketRepository->save($basket);
        } else {
            $status = 'wrong session_id';
        }

        $response = [
            'status' => $status,
            'quantity' => $quantity,
            'count' => App::call()->basketRepository->getCountWhere('session_id', $session_id),
            'sum' => App::call()->basketRepository->getBasketSum( $session_id)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}