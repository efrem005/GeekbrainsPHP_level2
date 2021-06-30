<?php


namespace app\models;


use app\engine\Db;
use app\interfaces\IModel;

abstract class DBModel implements IModel
{
    protected $props = [];

    abstract protected static function getTableName();

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return DB::getInstance()->queryObject($sql, ['id' => $id], get_called_class());
    }

    public static function getCountWhere($name, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `{$name}` = :value";
        return DB::getInstance()->queryOne($sql, ['value' => $value])['count'];
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return DB::getInstance()->queryObjectAll($sql, [], get_called_class());
    }

    public static function getWhere($name, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :id";

        return DB::getInstance()->queryObject($sql, ['id' => $value], get_called_class());
    }

    public static function getWhereAll($name, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :id";

        return DB::getInstance()->queryObjectAll($sql, ['id' => $value], get_called_class());
    }

    protected function insert()
    {
        $params = [];

        foreach ($this->props as $key => $value) {
            if ($key == false) continue;
            $columns[":{$key}"] = $key;
            $params["{$key}"] = $this->$key;
        }

        $column = implode(', ', array_values($columns));
        $value = implode(', ', array_keys($columns));
        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ($column) VALUES ($value)";

        DB::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();
    }

    protected function update()
    {
        $placeholders = [];
        $params[':id'] = $this->id;

        foreach ($this->props as $key => $value) {
            if ($value == false) continue;
            $placeholders[] = "{$key} = :{$key}";
            $params[":{$key}"] = $this->$key;
        }

        $tableName = static::getTableName();
        $placeholders = implode(', ', $placeholders);

        $sql = "UPDATE {$tableName} SET {$placeholders} WHERE id = :id;";

        DB::getInstance()->execute($sql, $params);
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";

        DB::getInstance()->execute($sql, [':id' => $this->id]);
    }

    public function save()
    {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }
}
