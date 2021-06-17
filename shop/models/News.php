<?php

namespace app\models;

class News extends Model
{
    public $id;
    public $title;
    public $text;
    public $category_id;
    public $view;

    public function __construct(
        $title = '',
        $text = ''
    )
    {
        $this->title = $title;
        $this->text = $text;
    }
}