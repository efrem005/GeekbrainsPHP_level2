<?php

namespace app\models\news;
use app\models\Model;

class News extends Model
{
    protected $id;
    protected $title;
    protected $text;
    protected $category_id;
    protected $view;

    public $props = [
        'title' => false,
        'text' => false,
        'category_id' => false,
        'view' => false
    ];

    public function __construct(
        $title = null,
        $text = null,
        $category_id = null,
        $view = null
    )
    {
        $this->title = $title;
        $this->text = $text;
        $this->category_id = $category_id;
        $this->view = $view;
    }

    protected static function getTableName(): string
    {
        return 'news';
    }

}