<?php

namespace app\models;


class Users extends Model
{
    public $id;
    public $login;
    public $pass;
    public $hash;
    public $role;
    public $fast_name;

    public function __construct(
        $login = '',
        $pass = '',
        $hash = '',
        $role = null,
        $fast_name = ''
    )
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
        $this->role = $role;
        $this->fast_name = $fast_name;
    }
}