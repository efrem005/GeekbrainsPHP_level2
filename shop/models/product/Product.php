<?php

namespace app\models\product;

use app\models\Model;

class Product extends Model
{
    public $id; // ID товара
    public $title; // Наименование
    public $article; // Код товара
    public $description; // Описание товара
    public $price; // Цена
    public $weight; // Вес
    public $count; // Остаток на складе
    public $units; // шт\кг\г
    public $category_id; // id категории

    public function __construct(
        $title = 'Без названия',
        $article = 0,
        $description = 'Без описания',
        $price = 0,
        $weight = 0,
        $count = 0,
        $units = '',
        $category_id = 0
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

    public function getProduct()
    {
        echo "
        <hr><b>Код товара:</b> {$this->article}<br>
        <b>Наименование:</b> {$this->title}<br>
        <b>Описание товара:</b> {$this->description}<br>
        <b>Вес:</b> {$this->weight} г.<br>
        <b>Цена:</b> {$this->price} Руб.<br>
        <b>Остаток:</b> {$this->count} {$this->units}<br>
        ";
    }
}