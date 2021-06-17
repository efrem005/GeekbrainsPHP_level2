<?php

namespace app\models\product;


class Phone extends Product
{
    public $color; // Цвет
    public $system; // Операционная система
    public $processor; // Процессор
    public $display; // Дисплей
    public $ram; // Объем оперативной памяти
    public $rom; // Объем встроенной памяти

    public function __construct(
        $id = 0,
        $title = 'Без названия',
        $article = 0,
        $description = 'Без описания',
        $price = 0,
        $weight = 0,
        $count = 0,
        $units = '',
        $category_id = 0,
        $color = null,
        $system = 'не указан',
        $processor = 'не указан',
        $display = 'не указан',
        $ram = 0,
        $rom = 0
    )
    {
        parent::__construct($title, $article, $description, $price, $weight, $count, $units, $category_id);
        $this->color = $color;
        $this->system = $system;
        $this->processor = $processor;
        $this->display = $display;
        $this->ram = $ram;
        $this->rom = $rom;
    }

    public function getProduct()
    {
        parent::getProduct();
        echo "
        <b>Цвет:</b> {$this->color}<br>
        <b>Дисплей:</b> {$this->display}<br>
        <b>Операционная система:</b> {$this->system}<br>
        <b>Процессор:</b> {$this->processor}<br>
        <b>Объем оперативной памяти:</b> {$this->ram} гб<br>
        <b>Объем встроенной памяти:</b> {$this->rom} гб<br><hr>
        ";
    }
}