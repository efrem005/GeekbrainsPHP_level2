<?php

namespace app\controller;

use app\models\backet\Basket;
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
        $this->page = $_GET['page'];
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
        $offset = $_GET['offset'] + 4;
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
        $id = $_GET['id'];
        $card = Product::getOne($id);
        $review = Reviews::getReviewOne($id);
        echo $this->render('card', [
            'item' => $card,
            'review' => $review
        ]);
    }

    public function actionCardUpdate(){
        $id = $_GET['id'];
        $card = Product::getOne($id);
        echo $this->render('cardUpdate', ['item' => $card]);
    }

    public function actionUpdate()
    {
        $id = $_GET['id'];
        $card = Product::getOne($id);
        $card->title = $_POST['title'];
        $card->price = (int)$_POST['price'];
        $card->count = (int)$_POST['count'];
        $card->description = $_POST['description'];
        $card->save();
        header("Location: /product/card/?id={$id}");
        die();
    }

    public function actionBuy()
    {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        $backet = new Basket(2, (int)$id, 1, (int)$product->price, session_id());
        $backet->save();
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        die();
    }
}