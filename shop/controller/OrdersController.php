<?php


namespace app\controller;


use app\engine\Request;
use app\engine\Session;
use app\models\orders\Orders;

class OrdersController extends Controller
{
    public function actionBuy()
    {
        $user = (new Request())->getParams()['name'];
        $phone = (new Request())->getParams()['phone'];
        $summ = (new Request())->getParams()['summ'];
        $session_id = (new Session())->getId();
        (new Orders($user, $phone, $summ, $session_id, 'в обработке'))->save();
        (new Session())->regenerate();
        header("Location: /product");
        die();
    }

    public function actionStatus()
    {
        $id = (new Request())->getParams()['id'];
        $status = (new Request())->getParams()['status'];
        $order = Orders::getOne($id);
        $order->status = $status;
        $order->save();
        header("Location: " . (new Request())->getHttpReferer());
        die();
    }
}