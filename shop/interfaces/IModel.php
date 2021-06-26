<?php

namespace app\interfaces;


interface IModel
{
    public static function getOne($id);
    public static function getAll();
    public function delete();
    public function save();
}