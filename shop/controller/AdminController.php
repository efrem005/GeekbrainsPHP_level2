<?php


namespace app\controller;


use app\engine\Request;
use app\models\backet\Basket;
use app\models\orders\Orders;
use app\models\product\Product;
use app\models\reviews\Reviews;
use app\models\user\Users;

class AdminController extends Controller
{

    public function actionProduct()
    {
        $catalog = Product::getAll();
        echo $this->render('admin/admin_product', [
            'catalog' => $catalog,
        ]);
    }

    public function actionUpdateProduct()
    {
        $id = (new Request())->getParams()['id'];
        $card = Product::getOne($id);
        $card->title = (new Request())->getParams()['title'];
        $card->price = (new Request())->getParams()['price'];
        $card->count = (new Request())->getParams()['count'];
        $card->description = (new Request())->getParams()['description'];
        $card->created_at = date("Y-m-d H:i:s");
        $card->save();
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        die();
    }

    public function actionReviews()
    {
        $reviews = Reviews::getReviewAll();
        echo $this->render('admin/admin_reviews', ['reviews' => $reviews]);
    }

    public function actionOrders()
    {
        $orders = Orders::getAll();
        echo $this->render('admin/admin_orders', ['orders' => $orders]);
    }

    public function actionOrderList()
    {
        $id = (new Request())->getParams()['id'];
        $order = Orders::getOne($id);
        $basket = Basket::getBasket($order->session_id);
        echo $this->render('admin/admin_orders_list', ['basket' => $basket]);
    }

    public function actionOrderDelete()
    {
        $id = (new Request())->getParams()['id'];
        $order = Orders::getOne($id);
        $order->delete();
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        die();
    }

    public function actionUsers()
    {
        $users = Users::getAll();
        echo $this->render('admin/admin_users', ['users' => $users]);
    }

    public function actionUpdateUser()
    {
        $id = (new Request())->getParams()['id'];
        $user = Users::getOne($id);
        $user->fast_name = (new Request())->getParams()['fastName'];
        $user->login = (new Request())->getParams()['login'];
        $user->role = (new Request())->getParams()['role'];
        $user->save();
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        die();
    }

    public function actionDeleteUser()
    {
        $id = (new Request())->getParams()['id'];
        $user = Users::getOne($id);
        $user->delete();
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        die();
    }
}