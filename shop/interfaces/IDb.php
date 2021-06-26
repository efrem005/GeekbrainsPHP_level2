<?php

namespace app\interfaces;


interface IDb
{
    public function lastInsertId();
    public function queryObject($sql, $params, $class);
    public function queryOne($sql, $params);
    public function queryAll($sql, $params);
    public function execute($sql, $params);
}