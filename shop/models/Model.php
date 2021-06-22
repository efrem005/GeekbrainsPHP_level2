<?php

namespace app\models;

use app\interfaces\IModel;


abstract class Model extends DBModel
{
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}