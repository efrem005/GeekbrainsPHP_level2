<?php

namespace app\controller;


use app\engine\App;
use app\models\entities\reviews\Reviews;


class ReviewsController extends Controller
{
    protected function actionIndex()
    {
        $reviews = App::call()->reviewsRepositories->getReviewAll();
        echo $this->render('reviews', ['reviews' => $reviews]);
    }

    protected function actionDelete()
    {
        $id = App::call()->request->getParams()['id'];
        $review = App::call()->reviewsRepositories->getOne($id);
        App::call()->reviewsRepositories->delete($review);
        header("Location: " . App::call()->request->getHttpReferer());
        die();
    }

    protected function actionAdd()
    {
        $user = App::call()->request->getParams()['user'];
        $text = App::call()->request->getParams()['text'];
        $product_id = App::call()->request->getParams()['id'];
        $review = new Reviews($user, $text, $product_id);
        App::call()->reviewsRepositories->save($review);
        header("Location: " . App::call()->request->getHttpReferer());
        die();
    }
}