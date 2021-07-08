<?php

namespace app\models\entities\backet;

use app\models\Model;


class Basket extends Model
{
    protected $id;
    protected $user_id;
    protected $product_id;
    protected $count;
    protected $price;
    protected $session_id;

    public $props = [
        'user_id' => false,
        'product_id' => false,
        'count' => false,
        'price' => false,
        'session_id' => false
    ];

    public function __construct(
        $user_id = null,
        $product_id = null,
        $count = null,
        $price = null,
        $session_id = null
    )
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->count = $count;
        $this->price = $price;
        $this->session_id = $session_id;
    }
}