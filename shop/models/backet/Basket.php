<?php

namespace app\models\backet;

use app\engine\Db;
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