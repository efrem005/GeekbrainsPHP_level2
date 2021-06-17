<?php

namespace app\models;

class Reviews extends Model
{
    public  $id;
    public  $user_id;
    public  $text;
    public  $product_id;


    public function __construct(
        $user_id = '',
        $text = ''
    )
    {
        $this->user_id = $user_id;
        $this->text = $text;
    }
}