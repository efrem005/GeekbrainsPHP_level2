<?php

namespace app\models\repositories\news;

use app\models\entities\news\News;
use app\models\Repositories;


class NewsRepositories extends Repositories
{
    protected function getTableName(): string
    {
        return 'news';
    }

    protected function getEntitiesClass(): string
    {
        return News::class;
    }

}