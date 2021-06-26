<?php


namespace app\controller;


class IndexController extends Controller
{
    protected function actionIndex()
    {
        echo $this->render('index');
    }
}