<?php

namespace app\models\product;

use app\interfaces\IModel;


abstract class Model implements IModel
{
    protected $db;

    static function modelName()
    {
        $classNames = explode('\\', static::class);
        $lowerCase = array_pop($classNames);
        return strtolower($lowerCase);
    }

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->modelName()} WHERE id = {$id}";

        echo $this->db->executeQuery($sql) . '<br>';
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->modelName()}";

        echo $this->db->getAssocResult($sql) . '<br>';
    }

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}