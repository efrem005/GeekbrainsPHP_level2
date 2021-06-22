<?php


namespace app\models;


use app\engine\Db;
use app\interfaces\IModel;

abstract class DBModel implements IModel
{
    abstract protected static function getTableName();

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return DB::getInstance()->queryObject($sql, ['id' => $id], get_called_class());
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return DB::getInstance()->queryObjectAll($sql, [], get_called_class());
    }

    protected function insert()
    {
        $params = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $columns[] = $key;
            $params[":{$key}"] = $value;
        }

        $column = implode(', ', $columns);
        $value = implode(', ', array_keys($params));
        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ($column) VALUES ($value)";

        DB::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();

    }

    protected function update()
    {
        $placeholders = [];
        $params[':id'] = $this->id;

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            if ($this->props[$key]) {
                $placeholders[] = "{$key} = :{$key}";
                $params[":{$key}"] = $value;
            }
        }

        $tableName = static::getTableName();
        $placeholders = implode(', ', $placeholders);

        $sql = "UPDATE {$tableName} SET  {$placeholders} WHERE id = :id;";

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
