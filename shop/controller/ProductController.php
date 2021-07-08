<?php

namespace app\controller;


use app\engine\Request;
use app\models\repositories\product\ProductRepositories;
use app\models\repositories\reviews\ReviewsRepositories;


class ProductController extends Controller
{
    protected $page = 0;
    protected $offSet = 4;

    protected function actionIndex()
    {
        $count = (int)(new ProductRepositories())->getCountAll();
        $pagination = ceil($count/$this->offSet);
        $catalog = (new ProductRepositories())->getProductPage($this->page, $this->offSet);
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
        $count = (int)(new ProductRepositories())->getCountAll();
        $pagination = ceil($count/$this->offSet);
        $catalog = (new ProductRepositories())->getProductPage($this->page, $this->offSet);
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
        $count = (int)(new ProductRepositories())->getCountAll();
        $pagination = ceil($count/$this->offSet);
        $catalog = (new ProductRepositories())->getProductLimit($offset);
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
        $card = (new ProductRepositories())->getOne($id);
        $review = (new ReviewsRepositories())->getReviewOne($id);
        echo $this->render('card', [
            'item' => $card,
            'review' => $review
        ]);
    }

}