<?php

namespace app\controllers;
use app\engine\App;
use app\models\entity\Order;

class OrderController extends Controller
{
    public function actionIndex()
    {
        if(App::call()->usersRepository->isAdmin()) {
            $orders = App::call()->orderRepository->getOrders();
            echo $this->render('order/orders', ['orders' => $orders]);
        }
    }

    public function actionAdd()
    {
        $session_id = session_id();
        $status = 'Что-то пошло не так с офомлением заказа';
        if (isset(App::call()->request->getParams()['name']) && isset(App::call()->request->getParams()['phone']))
        {
            $name = App::call()->request->getParams()['name'];
            $phone = App::call()->request->getParams()['phone'];

            $order = new Order($name, $phone, $session_id);
            App::call()->orderRepository->save($order);
            $status = 'Ваш заказ успешно оформлен';
            // TODO проверить что заказ успешно записан в базу
            session_regenerate_id();
        }

        echo $this->render('order/orderStatus', ['status' => $status]);
    }
    public function actionDetails()
    {
        if(App::call()->usersRepository->isAdmin()) {
            $id = App::call()->request->getParams()['id'];
            $order = App::call()->orderRepository->getOne($id);
            $basket = App::call()->basketRepository->getBasket($order->session_id);

            echo $this->render('order/order', [
                'order' => $order, 'basket' => $basket
            ]);
        }
    }

}