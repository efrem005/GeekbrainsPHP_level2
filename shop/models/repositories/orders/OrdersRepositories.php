<?php

namespace app\models\repositories\orders;

use app\models\entities\orders\Orders;
use app\models\Repositories;


class OrdersRepositories extends Repositories
{
    protected function getTableName(): string
    {
        return 'orders';
    }

    protected function getEntitiesClass()
    {
        return Orders::class;
    }

}