<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;


abstract class Repositories implements IModel
{
    protected $props = [];

    abstract protected function getTableName();
    abstract protected function getEntitiesClass();

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return DB::getInstance()->queryObject($sql, ['id' => $id], $this->getEntitiesClass());
    }

    public function getCountWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `{$name}` = :value";
        return DB::getInstance()->queryOne($sql, ['value' => $value])['count'];
    }

    public function getCountAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName}";
        return DB::getInstance()->queryOne($sql, [])['count'];
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return DB::getInstance()->queryObjectAll($sql, [], $this->getEntitiesClass());
    }

    public function getWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :id";

        return DB::getInstance()->queryObject($sql, ['id' => $value], $this->getEntitiesClass());
    }

    public function getWhereAll($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :id";

        return DB::getInstance()->queryObjectAll($sql, ['id' => $value], $this->getEntitiesClass());
    }

    protected function insert(Model $entity)
    {
        $params = [];

        foreach ($entity->props as $key => $value) {
            if ($key == false) continue;
            $columns[":{$key}"] = $key;
            $params["{$key}"] = $entity->$key;
        }

        $column = implode(', ', array_values($columns));
        $value = implode(', ', array_keys($columns));
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ($column) VALUES ($value)";

        DB::getInstance()->execute($sql, $params);
        $entity->id = DB::getInstance()->lastInsertId();
    }

    protected function update(Model $entity)
    {
        $placeholders = [];
        $params[':id'] = $entity->id;

        foreach ($entity->props as $key => $value) {
            if (!$value) continue;
            $params[":{$key}"] = $entity->$key;
            $placeholders[] = "{$key} = :{$key}";
            $entity->props[$key] = false;
        }

        $tableName = $this->getTableName();
        $placeholders = implode(', ', $placeholders);

        $sql = "UPDATE {$tableName} SET {$placeholders} WHERE id = :id;";

        DB::getInstance()->execute($sql, $params);
    }

    public function delete(Model $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";

        DB::getInstance()->execute($sql, [':id' => $entity->id]);
    }

    public function save(Model $entity)
    {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
}
