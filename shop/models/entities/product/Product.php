<?php

namespace app\models\entities\product;

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
        'category_id' => false,
        'created_at' => false
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
}