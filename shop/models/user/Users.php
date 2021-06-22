<?php

namespace app\models\user;
use app\models\Model;

class Users extends Model
{
    public $id;
    public $login;
    public $pass;
    public $hash;
    public $role;
    public $fast_name;

    public function __construct(
        $login = null,
        $pass = null,
        $hash = null,
        $role = null,
        $fast_name = null
    )
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
        $this->role = $role;
        $this->fast_name = $fast_name;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}
