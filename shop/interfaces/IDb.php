<?php

namespace app\interfaces;


interface IDb
{
    public function lastInsertId();
    public function queryObject($sql, $params, $class);
    public function executeQuery($sql, $params);
    public function getAssocResult($sql, $params);
    public function execute($sql, $params);
}