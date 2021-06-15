<?php

namespace app\models\product;


class Vacuum extends Product
{
    public $cleaning; //Тип уборки
    public $aquafilter; //Аквафильтр
    public $brushes; // Щетка
    public $power; // Мощность
    public $noise; // Уровень шума

    public function __construct(
        $id = 0,
        $title = 'Без названия',
        $article = 0,
        $description = 'Без описания',
        $price = 0,
        $weight = 0,
        $count = 0,
        $cleaning = 'не указан',
        $aquafilter = 'не указан',
        $brushes = 'не указан',
        $power = 0,
        $noise = 0,
        $db = null
    )
    {
        parent::__construct($id, $title, $article, $description, $price, $weight, $count, $db);
        $this->cleaning = $cleaning;
        $this->aquafilter = $aquafilter;
        $this->brushes = $brushes;
        $this->power = $power;
        $this->noise = $noise;
        $this->db = $db;
    }

    public function getProduct()
    {
        parent::getProduct();
        echo "
        <b>Тип уборки:</b> {$this->cleaning}<br>
        <b>Аквафильтр:</b> {$this->aquafilter}<br>
        <b>Щетка:</b> {$this->brushes}<br>
        <b>Мощность:</b> {$this->power} Ватт<br>
        <b>Уровень шума:</b> {$this->noise} дб<br><hr>
        ";
    }
}