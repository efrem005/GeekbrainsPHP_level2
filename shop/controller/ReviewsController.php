<?php

namespace app\controller;

use app\engine\Request;
use app\models\entities\reviews\Reviews;
use app\models\repositories\reviews\ReviewsRepositories;


class ReviewsController extends Controller
{
    protected function actionIndex()
    {
        $reviews = (new ReviewsRepositories())->getReviewAll();
        echo $this->render('reviews', ['reviews' => $reviews]);
    }

    protected function actionDelete()
    {
        $id = (new Request())->getParams()['id'];
        $review = (new ReviewsRepositories())->getOne($id);
        $review->delete();
        header("Location: " . (new Request())->getHttpReferer());
    }

    protected function actionAdd()
    {
        $user = (new Request())->getParams()['user'];
        $text = (new Request())->getParams()['text'];
        $product_id = (new Request())->getParams()['id'];
        $review = new Reviews($user, $text, $product_id);
        (new ReviewsRepositories())->save($review);
        header("Location: " . (new Request())->getHttpReferer());
    }
}