<?php

namespace app\controller;


use app\engine\App;
use app\models\entities\user\Users;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];

        if (App::call()->usersRepositories->getAuth($login, $pass)){
            if (isset(App::call()->request->getParams()['save'])){
                $hash = uniqid(rand(), true);
                $user = App::call()->usersRepositories->getWhere('login', $login);
                $user->hash = $hash;
                App::call()->usersRepositories->save($user);
                setcookie("hash", $hash, time() + 36000, '/');
            }
            header("Location:" . App::call()->request->getHttpReferer());
            die();
        } else {
            die("Ошибка");
        }
    }

    public function actionAdd()
    {
        if (App::call()->request->getMethod() == 'POST'){
            $user = new Users(
                App::call()->request->getParams()['login'],
                password_hash(App::call()->request->getParams()['pass'], PASSWORD_DEFAULT),
                App::call()->request->getParams()['fastName']
            );
            App::call()->usersRepositories->save($user);
            header("Location: /");
            die();
        }
    }

    public function actionLogout()
    {
        header("Location:" . App::call()->request->getHttpReferer());
        if(App::call()->usersRepositories->isAdmin()){
            header("Location: /");
        }
        App::call()->session->regenerate();
        App::call()->session->destroy();
        setcookie("hash", "", time() - 36000, '/');
        die();
    }
}