<?php


namespace app\controller;


use app\engine\Request;
use app\engine\Session;
use app\models\entities\orders\Orders;
use app\models\repositories\orders\OrdersRepositories;

class OrdersController extends Controller
{
    public function actionBuy()
    {
        $user = (new Request())->getParams()['name'];
        $phone = (new Request())->getParams()['phone'];
        $summ = (new Request())->getParams()['summ'];
        $session_id = (new Session())->getId();
        $order = new Orders($user, $phone, $summ, $session_id, 'в обработке');
        (new OrdersRepositories())->save($order);
        (new Session())->regenerate();
        header("Location: /product");
        die();
    }

    public function actionStatus()
    {
        $id = (new Request())->getParams()['id'];
        $status = (new Request())->getParams()['status'];
        $order = (new OrdersRepositories())->getOne($id);
        $order->status = $status;
        (new OrdersRepositories())->save($order);
        header("Location: " . (new Request())->getHttpReferer());
        die();
    }
}