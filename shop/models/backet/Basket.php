<?php

namespace app\models\backet;

use app\models\Model;


class Basket extends Model
{
    public $id;
    public $user_id;
    public $title;
    public $count;
    public $price;
    public $session_id;

    public function __construct(
        $title = '',
        $count = 0,
        $price = 0,
        $session_id = ''
    )
    {
        $this->title = $title;
        $this->count = $count;
        $this->price = $price;
        $this->session_id = $session_id;
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