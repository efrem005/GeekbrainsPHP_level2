<?php

namespace app\models\repositories\reviews;

use app\engine\App;
use app\models\entities\reviews\Reviews;
use app\models\Repositories;


class ReviewsRepositories extends Repositories
{
    protected function getTableName()
    {
        return 'reviews';
    }

    protected function getEntitiesClass()
    {
        return Reviews::class;
    }

    public function getReviewOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE product_id = :id";

        return App::call()->db->queryObjectAll($sql, ['id' => $id], $this->getEntitiesClass());
    }

    public function getReviewAll()
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

        return App::call()->db->queryObjectAll($sql, [], $this->getEntitiesClass());
    }

}