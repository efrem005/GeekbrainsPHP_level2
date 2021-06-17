<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;


abstract class Model implements IModel
{
    /**
     * @return string
     */
    public static function modelName()
    {
        $classNames = explode('\\', static::class);
        $lowerCase = array_pop($classNames);
        return strtolower($lowerCase);
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->modelName()} WHERE id = :id";

        return DB::getInstance()->queryObject($sql, ['id' => $id], get_called_class());
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->modelName()}";

        return DB::getInstance()->getAssocResult($sql, []);
    }

    public function Insert()
    {
        $params = [];

        foreach ($this as $key => $item) {
            if ($key == 'id') continue;
            $rowA[] = $key;
            $valueA[] = ":$key";
            $params[$key] = $item;
        }

        $row = implode(', ', $rowA);
        $value = implode(', ', $valueA);

        $sql = "INSERT INTO {$this->modelName()} ($row) VALUES ($value)";

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();

    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        $sql = "DELETE FROM {$this->modelName()} WHERE id = :id";

        DB::getInstance()->execute($sql, [':id' => $this->id]);
    }
}