<?php

namespace app\controller;

use app\models\user\Users;


class UserController extends Controller
{
    public function actionAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new Users();
            $user->login = $_POST['login'];
            $user->pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $user->role = 0;
            $user->fast_name = $_POST['fastName'];
            $user->save();
            header("Location: /");
            die();
        }
    }
}
