<?php

namespace app\interfaces;

use app\models\Model;


interface IModel
{
    public function getOne($id);
    public function getCountWhere($name, $value);
    public function getAll();
    public function getWhere($name, $value);
    public function getWhereAll($name, $value);
    public function delete(Model $entity);
    public function save(Model $entity);
}