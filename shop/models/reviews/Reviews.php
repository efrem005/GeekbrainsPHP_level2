<?php

namespace app\models\reviews;
use app\engine\Db;
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

    protected static function getTableName()
    {
        return 'reviews';
    }

    public static function getReviewOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE product_id = :id";

        return Db::getInstance()->queryObjectAll($sql, ['id' => $id], get_called_class());
    }

    public static function getReviewAll()
    {
        $sql = "SELECT
                       r.id as `id`,
                       r.user as user,
                       r.text as `text`,
                       r.product_id as `product_id`,
                       p.title as `product`,
                       r.created_at as `created_at`
                FROM reviews r
                JOIN product p on p.id = r.product_id;";

        return Db::getInstance()->queryObjectAll($sql, [], get_called_class());
    }

}