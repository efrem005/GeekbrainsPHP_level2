<?php

namespace app\engine;


use \PDO;

class Db
{
    protected $config;
    protected $connection = null;

    public function __construct(
        $driver = null,
        $host = null,
        $database = null,
        $charset = "utf8",
        $login = null,
        $password = null
    )
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['database'] = $database;
        $this->config['charset'] = $charset;
        $this->config['login'] = $login;
        $this->config['password'] = $password;
    }

    protected function getDb(): PDO
    {
        if (is_null($this->connection)) {
            $this->connection = new PDO($this->getDbConfig(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    protected function getDbConfig(): string
    {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
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
        return $this->connection->lastInsertId();
    }

    public function queryObject($sql, $params, $class)
    {
        $sql = $this->query($sql, $params);
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return $sql->fetch();
    }

    public function queryObjectAll($sql, $params, $class)
    {
        $sql = $this->query($sql, $params);
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return $sql->fetchAll();
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