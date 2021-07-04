<?php

namespace app\models\repositories\user;

use app\models\entities\user\Users;
use app\models\Repositories;


class UsersRepositories extends Repositories
{
    protected function getTableName(): string
    {
        return 'users';
    }

    protected function getEntitiesClass()
    {
        return Users::class;
    }

    public function getAuth($login, $pass)
    {
        $user = $this->getWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            $_SESSION['id'] = $user->id;
            $_SESSION['login'] = $login;
            $_SESSION['fastName'] = $user->fast_name;
            $_SESSION['role'] = $user->role;
            return true;
        } else {
            return false;
        }
    }

    public function isAuth()
    {
        if (isset($_COOKIE["hash"]) && !isset($_SESSION['login'])) {
            $hash = $_COOKIE["hash"];
            $user = $this->getWhere('hash', $hash);
            if (!empty($user)) {
                $_SESSION['id'] = $user->id;
                $_SESSION['login'] = $user->login;
                $_SESSION['fastName'] = $user->fast_name;
                $_SESSION['role'] = $user->role;
            }
        }
        return isset($_SESSION['login']);
    }

    public function isAdmin()
    {
        return $_SESSION['role'] == 1;
    }

    public function getName()
    {
        return $_SESSION['login'];
    }

    public function getFastName()
    {
        return (isset($_SESSION['fastName'])) ? $_SESSION['fastName'] : 'Гость';
    }

}
