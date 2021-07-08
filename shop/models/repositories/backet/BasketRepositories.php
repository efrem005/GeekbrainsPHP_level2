<?php

namespace app\models\repositories\backet;

use app\engine\App;
use app\models\entities\backet\Basket;
use app\models\Repositories;


class BasketRepositories extends Repositories
{
    protected function getTableName(): string
    {
        return 'basket';
    }

    protected function getEntitiesClass(): string
    {
        return Basket::class;
    }

    public function getBasket($session_id)
    {
        $sql = "SELECT b.id as `id`, b.count as `count`, `title`, b.price as `price`, p.units as units, product_id FROM basket b JOIN product p on p.id = b.product_id WHERE b.session_id = :session_id";
        return App::call()->db->queryObjectAll($sql, [':session_id' => $session_id], $this->getEntitiesClass());
    }

    public function getBacketOne($id, $session_id)
    {
        $sql = "SELECT * FROM `basket` WHERE product_id = :product_id AND `session_id` = :session_id";
        return App::call()->db->queryObject($sql, [':product_id' => $id, ':session_id' => $session_id], $this->getEntitiesClass());
    }

    public function getCountUp($id, $session_id)
    {
        $sql = "UPDATE `basket` SET `count`=`count`+1 WHERE `product_id` = :product_id AND `session_id` = :session_id";
        App::call()->db->execute($sql, [':product_id' => $id, ':session_id' => $session_id]);
    }

    public function getCountDown($id, $session_id)
    {
        $sql = "UPDATE `basket` SET `count`=`count`-1 WHERE `product_id` = :product_id AND `session_id` = :session_id";
        App::call()->db->execute($sql, [':product_id' => $id, ':session_id' => $session_id]);
    }

    public function getSummBasket($session_id)
    {
        $sql = "SELECT SUM(price*count) AS sum_price FROM `basket` WHERE `session_id` = :session_id";
        return App::call()->db->queryOne($sql, ['session_id' => $session_id])['sum_price'];
    }

}