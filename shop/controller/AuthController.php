<?php


namespace app\controller;


use app\engine\Request;
use app\engine\Session;
use app\models\user\Users;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];

        if (Users::getAuth($login, $pass)){
            if (isset((new Request())->getParams()['save'])){
                $user = Users::getWhere('login', $login);
                $hash = uniqid(rand(), true);
                $user->hash = $hash;
                $user->save();
                setcookie("hash", $hash, time() + 36000, '/');
            }
            header("Location:" . (new Request())->getHttpReferer());
            die();
        } else {
            die("Ошибка");
        }
    }

    public function actionAdd()
    {
        if ((new Request())->getMethod() == 'POST'){
            (new Users(
                (new Request())->getParams()['login'],
                password_hash((new Request())->getParams()['pass'], PASSWORD_DEFAULT),
                (new Request())->getParams()['fastName']
            ))->save();
            header("Location: /");
            die();
        }
    }

    public function actionLogout()
    {
        header("Location:" . (new Request())->getHttpReferer());
        if(Users::isAdmin()){
            header("Location: /");
        }
        (new Session())->regenerate();
        (new Session())->destroy();
        setcookie("hash", "", time() - 36000, '/');
        die();
    }
}