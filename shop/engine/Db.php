<?php

namespace app\engine;

use app\interfaces\IDb;
use app\traits\TSinletone;
use \PDO;

class Db implements IDb
{
    protected $db = null;

    use TSinletone;

    protected function getDb(): PDO
    {
        if (is_null($this->db)) {
            $this->db = new PDO($this->getDbConfig(),
                (new Request())->getEnv('USERNAME'),
                (new Request())->getEnv('PASSWORD')
            );
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->db;
    }

    protected function getDbConfig(): string
    {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            (new Request())->getEnv('DRIVER'),
            (new Request())->getEnv('HOST'),
            (new Request())->getEnv('DB'),
            (new Request())->getEnv('CHARSET')
        );
    }


    protected function query($sql, $params)
    {
        $sql = $this->getDb()->prepare($sql);
        $sql->execute($params);
        return $sql;
    }

    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }

    public function queryObject($sql, $params, $class)
    {
        $sql = $this->query($sql, $params);
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        $obj = $sql->fetch();
        if(!$obj){
            throw new \Exception('Такого продукта нет', 404);
        };
        return $obj;
    }

    public function queryObjectAll($sql, $params, $class)
    {
        $sql = $this->query($sql, $params);
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        $obj = $sql->fetchAll();
        if(!$obj){
            throw new \Exception('Такого продукта нет', 404);
        };
        return $obj;
    }

    public function queryOne($sql, $params)
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params)
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql, $params)
    {
        return $this->query($sql, $params)->rowCount();
    }
}