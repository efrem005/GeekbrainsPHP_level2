<?php


namespace app\controller;


use app\engine\App;
use app\models\entities\orders\Orders;


class OrdersController extends Controller
{
    public function actionBuy()
    {
        $user = App::call()->request->getParams()['name'];
        $phone = App::call()->request->getParams()['phone'];
        $summ = App::call()->request->getParams()['summ'];
        $session_id = App::call()->session->getId();
        $order = new Orders($user, $phone, $summ, $session_id, 'в обработке');
        App::call()->ordersRepositories->save($order);
        App::call()->session->regenerate();
        header("Location: /product");
        die();
    }

    public function actionStatus()
    {
        $id = App::call()->request->getParams()['id'];
        $status = App::call()->request->getParams()['status'];
        $order = App::call()->ordersRepositories->getOne($id);
        $order->status = $status;
        App::call()->ordersRepositories->save($order);
        header("Location: " . App::call()->request->getHttpReferer());
        die();
    }
}