<?php

namespace app\models\product;

use app\engine\Db;
use app\models\Model;

class Product extends Model
{
    protected $id; // ID товара
    protected $title; // Наименование
    protected $article; // Код товара
    protected $description; // Описание товара
    protected $price; // Цена
    protected $weight; // Вес
    protected $count; // Остаток на складе
    protected $units; // шт\кг\г
    protected $category_id; // id категории

    protected $props = [
        'title' => false,
        'article' => false,
        'description' => false,
        'price' => false,
        'weight' => false,
        'count' => false,
        'units' => false,
        'category_id' => false
    ];

    public function __construct(
        $title = null,
        $article = null,
        $description = null,
        $price = null,
        $weight = null,
        $count = null,
        $units = null,
        $category_id = null
    )
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->article = $article;
        $this->weight = $weight;
        $this->count = $count;
        $this->units = $units;
        $this->category_id = $category_id;
    }

    protected static function getTableName()
    {
        return 'product';
    }

    public static function getProductPage($id, $offSet)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY id LIMIT {$offSet} OFFSET " . $id * $offSet;
        return DB::getInstance()->queryObjectAll($sql, [], get_called_class());
    }

    public static function getProductLimit($offSet)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} ORDER BY id LIMIT {$offSet}";
        return DB::getInstance()->queryObjectAll($sql, [], get_called_class());
    }


// Изменение цены
    public function setPriceUpdate($price)
    {
        $this->price = $price;
        echo "<hr>Изменилась цена на {$this->title} на цену {$price} Руб.<br><hr>";
    }

// Купить
    public function setBuyProduct($count)
    {
        $this->count -= $count;
        echo "<hr>Вы купили {$this->title} в количестве {$count} шт.<br><hr>";
    }

// Скидка
    public function setSaleProduct($price)
    {
        $this->price -= $price;
    }
}