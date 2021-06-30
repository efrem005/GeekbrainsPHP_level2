<?php

namespace app\models\user;

use app\models\Model;

class Users extends Model
{
    protected $id;
    protected $login;
    protected $pass;
    protected $fast_name;
    protected $hash;
    protected $role;

    public $props = [
        'login' => false,
        'pass' => false,
        'fast_name' => false,
        'hash' => false,
        'role' => false
    ];

    public function __construct(
        $login = null,
        $pass = null,
        $fast_name = null,
        $hash = null,
        $role = null
    )
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->fast_name = $fast_name;
        $this->hash = $hash;
        $this->role = $role;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }

    public static function getAuth($login, $pass)
    {
        $user = Users::getWhere('login', $login);
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

    public static function isAuth()
    {
        if (isset($_COOKIE["hash"]) && !isset($_SESSION['login'])) {
            $hash = $_COOKIE["hash"];
            $user = Users::getWhere('hash', $hash);
            if (!empty($user)) {
                $_SESSION['id'] = $user->id;
                $_SESSION['login'] = $user->login;
                $_SESSION['fastName'] = $user->fast_name;
                $_SESSION['role'] = $user->role;
            }
        }
        return isset($_SESSION['login']);
    }

    public static function isAdmin()
    {
        return $_SESSION['role'] == 1;
    }

    public static function getName()
    {
        return $_SESSION['login'];
    }

    public static function getFastName()
    {
        return (isset($_SESSION['fastName'])) ? $_SESSION['fastName'] : 'Гость';
    }

}
