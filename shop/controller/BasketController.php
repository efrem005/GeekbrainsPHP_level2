<?php

namespace app\controller;

use app\models\backet\Basket;


class BasketController extends Controller
{
    protected function actionIndex()
    {
        $basket = Basket::getBasket();
        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }
}