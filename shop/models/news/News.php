<?php

namespace app\models\news;
use app\models\Model;

class News extends Model
{
    public $id;
    public $title;
    public $text;
    public $category_id;
    public $view;

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