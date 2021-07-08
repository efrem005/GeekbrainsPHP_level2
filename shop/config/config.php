<?php

use app\engine\Request;
use app\engine\Session;
use app\engine\Db;
use app\models\repositories\backet\BasketRepositories;
use app\models\repositories\news\NewsRepositories;
use app\models\repositories\orders\OrdersRepositories;
use app\models\repositories\product\ProductRepositories;
use app\models\repositories\reviews\ReviewsRepositories;
use app\models\repositories\user\UsersRepositories;


return [
    'root' => dirname(__DIR__),
    'CONTROLLER_DIR' => 'app\\controller\\',
    'VIEWS_DIR' => dirname(__DIR__) . '/views/',
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => "mysql",
            'host' => 'localhost',
            'database' => 'shopphp',
            'charset' => 'UTF8',
            'login' => 'root',
            'password' => 'root'
        ],
        'request' => [
            'class' => Request::class
        ],
        'session' => [
            'class' => Session::class
        ],
        'basketRepositories' => [
            'class' => BasketRepositories::class
        ],
        'newsRepositories' => [
            'class' => NewsRepositories::class
        ],
        'ordersRepositories' => [
            'class' => OrdersRepositories::class
        ],
        'productRepositories' => [
            'class' => ProductRepositories::class
        ],
        'reviewsRepositories' => [
            'class' => ReviewsRepositories::class
        ],
        'usersRepositories' => [
            'class' => UsersRepositories::class
        ]
    ]
];