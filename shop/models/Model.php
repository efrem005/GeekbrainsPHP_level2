<?php

namespace app\models;

use app\interfaces\IModel;


abstract class Model extends DBModel
{

    protected $props = [];

    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->props)){
            $this->props[$name] = true;
        }
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

}