<?php

namespace app\controller;


use app\engine\Request;
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
        $id = (new Request())->getParams()['id'];
        $review = Reviews::getOne($id);
        $review->delete();
        header("Location: " . (new Request())->getHttpReferer());
    }

    protected function actionAdd()
    {
        $user = (new Request())->getParams()['user'];
        $text = (new Request())->getParams()['text'];
        $product_id = (new Request())->getParams()['id'];
        (new Reviews($user, $text, $product_id))->save();
        header("Location: " . (new Request())->getHttpReferer());
    }
}