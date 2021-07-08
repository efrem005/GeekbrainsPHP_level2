<?php

namespace app\controller;


use app\engine\App;


class ProductController extends Controller
{
    protected $page = 0;
    protected $offSet = 4;

    protected function actionIndex()
    {
        $count = (int)App::call()->productRepositories->getCountAll();
        $pagination = ceil($count/$this->offSet);
        $catalog = App::call()->productRepositories->getProductPage($this->page, $this->offSet);
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'pagination' => $pagination,
            'offSet' => 4,
            'count' => $count
        ]);
    }

    public function actionPage()
    {
        $this->page = App::call()->request->getParams()['page'];
        $count = (int)App::call()->productRepositories->getCountAll();
        $pagination = ceil($count/$this->offSet);
        $catalog = App::call()->productRepositories->getProductPage($this->page, $this->offSet);
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'pagination' => $pagination,
            'offSet' => 4,
            'count' => $count
        ]);
    }

    public function actionLimit()
    {
        $offset = App::call()->request->getParams()['offset'] + 4;
        $count = (int)App::call()->productRepositories->getCountAll();
        $pagination = ceil($count/$this->offSet);
        $catalog = App::call()->productRepositories->getProductLimit($offset);
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'pagination' => $pagination,
            'offSet' => $offset,
            'count' => $count
        ]);
    }

    public function actionCard()
    {
        $id = App::call()->request->getParams()['id'];
        $card = App::call()->productRepositories->getOne($id);
        $review = App::call()->reviewsRepositories->getReviewOne($id);
        echo $this->render('card', [
            'item' => $card,
            'review' => $review
        ]);
    }

}