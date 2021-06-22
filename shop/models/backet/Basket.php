<?php

namespace app\models\backet;

use app\engine\Db;
use app\models\Model;


class Basket extends Model
{
    public $id;
    public $user_id;
    public $title;
    public $count;
    public $price;
    public $session_id;

    public function __construct(
        $user_id = null,
        $title = null,
        $count = null,
        $price = null,
        $session_id = null
    )
    {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->count = $count;
        $this->price = $price;
        $this->session_id = $session_id;
    }

    protected static function getTableName(): string
    {
        return 'basket';
    }

    public static function getBasket()
    {
        $sql = "SELECT b.id as `id`, b.count as `count`, `title`, b.price as `price`, p.units as units, product_id FROM basket b JOIN product p on p.id = b.product_id";
        return DB::getInstance()->queryObjectAll($sql, [], get_called_class());
    }

    function getSumAll()
    {
        echo "<hr>Всего: " . $this->count * $this->price . " Руб.<br><hr>";
    }
}