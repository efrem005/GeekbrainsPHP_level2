<?php

namespace app\models\orders;
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
        'session_id' => false
    ];

    public function __construct
    (
        $name = null,
        $phone = null,
        $session_id = null
    )
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id = $session_id;
    }

    protected static function getTableName(): string
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