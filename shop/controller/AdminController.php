<?php

namespace app\controller;

use app\engine\Request;
use app\models\repositories\backet\BasketRepositories;
use app\models\repositories\orders\OrdersRepositories;
use app\models\repositories\product\ProductRepositories;
use app\models\repositories\reviews\ReviewsRepositories;
use app\models\repositories\user\UsersRepositories;


class AdminController extends Controller
{

    public function actionProduct()
    {
        $catalog = (new ProductRepositories())->getAll();
        echo $this->render('admin/admin_product', [
            'catalog' => $catalog,
        ]);
    }

    public function actionUpdateProduct()
    {
        $id = (new Request())->getParams()['id'];
        $card = (new ProductRepositories())->getOne($id);
        $card->title = (new Request())->getParams()['title'];
        $card->price = (new Request())->getParams()['price'];
        $card->count = (new Request())->getParams()['count'];
        $card->description = (new Request())->getParams()['description'];
        $card->created_at = date("Y-m-d H:i:s");
        $card->save();
        header("Location: " . (new Request())->getHttpReferer());
        die();
    }

    public function actionReviews()
    {
        $reviews = (new ReviewsRepositories())->getReviewAll();
        echo $this->render('admin/admin_reviews', ['reviews' => $reviews]);
    }

    public function actionOrders()
    {
        $orders = (new OrdersRepositories())->getAll();
        echo $this->render('admin/admin_orders', ['orders' => $orders]);
    }

    public function actionOrderList()
    {
        $id = (new Request())->getParams()['id'];
        $order = (new OrdersRepositories())->getOne($id);
        $basket = (new BasketRepositories)->getBasket($order->session_id);
        echo $this->render('admin/admin_orders_list', ['basket' => $basket]);
    }

    public function actionOrderDelete()
    {
        $id = (new Request())->getParams()['id'];
        $order = (new OrdersRepositories())->getOne($id);
        $order->delete();
        header("Location: " . (new Request())->getHttpReferer());
        die();
    }

    public function actionUsers()
    {
        $users = (new UsersRepositories())->getAll();
        echo $this->render('admin/admin_users', ['users' => $users]);
    }

    public function actionUpdateUser()
    {
        $id = (new Request())->getParams()['id'];
        $user = (new UsersRepositories())->getOne($id);
        $user->fast_name = (new Request())->getParams()['fastName'];
        $user->login = (new Request())->getParams()['login'];
        $user->role = (new Request())->getParams()['role'];
        $user->save();
        header("Location: " . (new Request())->getHttpReferer());
        die();
    }

    public function actionDeleteUser()
    {
        $id = (new Request())->getParams()['id'];
        $user = (new UsersRepositories())->getOne($id);
        $user->delete();
        header("Location: " . (new Request())->getHttpReferer());
        die();
    }
}