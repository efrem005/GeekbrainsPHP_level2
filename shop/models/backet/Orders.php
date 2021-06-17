<?php

namespace app\models\backet;

use app\models\Model;


class Orders extends Model
{
    public $id;
    public $name;
    public $phone;
    public $session_id;

    public function __construct
    (
        $name = '',
        $phone = '',
        $session_id = ''
    )
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id = $session_id;
    }

    public function getProduct()
    {
        echo "
        <hr><b>Заказы</b><br>
        <b>Наименование:</b> {$this->name}<br>
        <b>Количество:</b> {$this->phone} шт.<br><hr>
        ";
    }


}