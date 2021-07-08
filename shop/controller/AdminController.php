<?php

namespace app\controller;

use app\engine\App;


class AdminController extends Controller
{

    public function actionProduct()
    {
        $catalog = App::call()->productRepositories->getAll();
        echo $this->render('admin/admin_product', [
            'catalog' => $catalog,
        ]);
    }

    public function actionUpdateProduct()
    {
        $id = App::call()->request->getParams()['id'];
        $card = App::call()->productRepositories->getOne($id);
        $card->title = App::call()->request->getParams()['title'];
        $card->price = App::call()->request->getParams()['price'];
        $card->count = App::call()->request->getParams()['count'];
        $card->description = App::call()->request->getParams()['description'];
        $card->created_at = date("Y-m-d H:i:s");
        App::call()->productRepositories->save($card);
        header("Location: " . App::call()->request->getHttpReferer());
        die();
    }

    public function actionDeleteProduct()
    {
        $id = App::call()->request->getParams()['id'];
        $product = App::call()->productRepositories->getOne($id);
        App::call()->productRepositories->delete($product);
        header("Location: " . App::call()->request->getHttpReferer());
        die();
    }

    public function actionReviews()
    {
        $reviews = App::call()->reviewsRepositories->getReviewAll();
        echo $this->render('admin/admin_reviews', ['reviews' => $reviews]);
    }

    public function actionOrders()
    {
        $orders = App::call()->ordersRepositories->getAll();
        echo $this->render('admin/admin_orders', ['orders' => $orders]);
    }

    public function actionOrderList()
    {
        $id = App::call()->request->getParams()['id'];
        $order = App::call()->ordersRepositories->getOne($id);
        $basket = App::call()->basketRepositories->getBasket($order->session_id);
        echo $this->render('admin/admin_orders_list', ['basket' => $basket]);
    }

    public function actionOrderDelete()
    {
        $id = App::call()->request->getParams()['id'];
        $order = App::call()->ordersRepositories->getOne($id);
        App::call()->ordersRepositories->delete($order);
        header("Location: " . App::call()->request->getHttpReferer());
        die();
    }

    public function actionUsers()
    {
        $users = App::call()->usersRepositories->getAll();
        echo $this->render('admin/admin_users', ['users' => $users]);
    }

    public function actionUpdateUser()
    {
        $id = App::call()->request->getParams()['id'];
        $user = App::call()->usersRepositories->getOne($id);
        $user->fast_name = App::call()->request->getParams()['fastName'];
        $user->login = App::call()->request->getParams()['login'];
        $user->role = App::call()->request->getParams()['role'];
        App::call()->usersRepositories->save($user);
        header("Location: " . App::call()->request->getHttpReferer());
        die();
    }

    public function actionDeleteUser()
    {
        $id = App::call()->request->getParams()['id'];
        $user = App::call()->usersRepositories->getOne($id);
        App::call()->usersRepositories->delete($user);
        header("Location: " . App::call()->request->getHttpReferer());
        die();
    }
}