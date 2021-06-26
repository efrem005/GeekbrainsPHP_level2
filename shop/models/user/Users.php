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

}
