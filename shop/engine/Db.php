<?php

namespace app\engine;

use app\interfaces\IDb;
use app\traits\TSinletone;
use \PDO;

class Db implements IDb
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'db' => 'shopphp',
        'charset' => 'UTF8',
        'username' => 'root',
        'password' => 'root',
    ];

    protected $db = null;

    use TSinletone;

    protected function getDb()
    {
        if (is_null($this->db)) {
            $this->db = new PDO($this->getDbConfig(),
                $this->config['username'],
                $this->config['password']
            );
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->db;
    }

    protected function getDbConfig()
    {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['db'],
            $this->config['charset']
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
        return $this->getDb()->lastInsertId();
    }

    public function queryObject($sql, $params, $class)
    {
        $sql = $this->query($sql, $params);
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return $sql->fetch();
    }

    public function executeQuery($sql, $params)
    {
        return $this->query($sql, $params)->fetch();
    }

    public function getAssocResult($sql, $params)
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute($sql, $params)
    {
        return $this->query($sql, $params)->rowCount();
    }
}