<?php

namespace app\models\entities\reviews;

use app\models\Model;


class Reviews extends Model
{
    protected $id;
    protected $user;
    protected $text;
    protected $product_id;

    public $props = [
        'user' => false,
        'text' => false,
        'product_id' => false
    ];

    public function __construct(
        $user = null,
        $text = null,
        $product_id = null
    )
    {
        $this->user = $user;
        $this->text = $text;
        $this->product_id = $product_id;
    }
}