<?php

namespace app\models\backet;


class Basket
{
    public $id;
    public $user_id;
    public $title;
    public $count;
    public $price;
    public $session_id;

    protected $db;

    public function __construct($title, $count, $price, $session_id, $db = null)
    {
        $this->title = $title;
        $this->count = $count;
        $this->price = $price;
        $this->session_id = $session_id;
        $this->db = $db;
    }

    function getBasket()
    {
        $sql = "SELECT * FROM basket WHERE user_id = {$this->user_id}";

        echo $this->db->executeQuery($sql) . '<br>';
    }

    function getSumAll()
    {
        echo "<hr>Всего: " . $this->count * $this->price . " Руб.<br><hr>";
    }

    public function getProduct()
    {
        echo "
        <hr><b>Корзина</b><br>
        <b>Наименование:</b> {$this->title}<br>
        <b>Количество:</b> {$this->count} шт.<br>
        <b>Цена:</b> {$this->price} Руб.<br><hr>
        ";
    }


}