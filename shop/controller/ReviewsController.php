<?php

namespace app\controller;


use app\models\reviews\Reviews;

class ReviewsController extends Controller
{
    protected function actionIndex()
    {
        $reviews = Reviews::getReviewAll();
        echo $this->render('reviews', ['reviews' => $reviews]);
    }

    protected function actionDelete()
    {
        $id = $_GET['id'];
        $review = Reviews::getOne($id);
        $review->delete();
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    protected function actionAdd()
    {
        $user = $_POST['user'];
        $text = $_POST['text'];
        $product_id = $_GET['id'];
        $review = new Reviews($user, $text, $product_id);
        $review->save();
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}