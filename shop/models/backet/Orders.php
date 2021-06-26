<?php

namespace app\models\backet;

use app\models\Model;


class Orders extends Model
{
    protected $id;
    protected $name;
    protected $phone;
    protected $session_id;

    public $props = [
        'name' => false,
        'phone' => false,
        '$session_id' => false
    ];

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

    protected static function getTableName()
    {
       return 'orders';
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