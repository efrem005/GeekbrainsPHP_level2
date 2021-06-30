<?php

namespace app\models\orders;
use app\models\Model;


class Orders extends Model
{
    protected $id;
    protected $name;
    protected $phone;
    protected $price;
    protected $session_id;
    protected $status;

    public $props = [
        'name' => false,
        'phone' => false,
        'price' => false,
        'session_id' => false,
        'status' => false
    ];

    public function __construct
    (
        $name = null,
        $phone = null,
        $price = null,
        $session_id = null,
        $status = null

    )
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->price = $price;
        $this->session_id = $session_id;
        $this->status = $status;
    }

    protected static function getTableName(): string
    {
        return 'orders';
    }

}