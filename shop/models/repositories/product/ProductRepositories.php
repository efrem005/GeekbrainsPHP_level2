<?php

namespace app\models\repositories\product;

use app\engine\Db;
use app\models\entities\product\Product;
use app\models\Repositories;


class ProductRepositories extends Repositories
{
    protected function getTableName()
    {
        return 'product';
    }

    protected function getEntitiesClass()
    {
        return Product::class;
    }

    public function getProductPage($id, $offSet)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY id LIMIT {$offSet} OFFSET " . $id * $offSet;
        return DB::getInstance()->queryObjectAll($sql, [], $this->getEntitiesClass());
    }

    public function getProductLimit($offSet)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY id LIMIT {$offSet}";
        return DB::getInstance()->queryObjectAll($sql, [], $this->getEntitiesClass());
    }

}