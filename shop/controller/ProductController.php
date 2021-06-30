<?php

namespace app\controller;

use app\engine\Request;
use app\models\reviews\Reviews;
use app\models\product\{Product};


class ProductController extends Controller
{
    protected $page = 0;
    protected $offSet = 4;

    protected function actionIndex()
    {
        $count = sizeof(Product::getAll());
        $pagination = ceil($count/$this->offSet);
        $catalog = Product::getProductPage($this->page, $this->offSet);
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'pagination' => $pagination,
            'offSet' => 4,
            'count' => $count
        ]);
    }

    public function actionPage()
    {
        $this->page = (new Request())->getParams()['page'];
        $count = sizeof(Product::getAll());
        $pagination = ceil($count/$this->offSet);
        $catalog = Product::getProductPage($this->page, $this->offSet);
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'pagination' => $pagination,
            'offSet' => 4,
            'count' => $count
        ]);
    }

    public function actionLimit()
    {
        $offset = (new Request())->getParams()['offset'] + 4;
        $count = sizeof(Product::getAll());
        $pagination = ceil($count/$this->offSet);
        $catalog = Product::getProductLimit($offset);
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'pagination' => $pagination,
            'offSet' => $offset,
            'count' => $count
        ]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $card = Product::getOne($id);
        $review = Reviews::getReviewOne($id);
        echo $this->render('card', [
            'item' => $card,
            'review' => $review
        ]);
    }

}