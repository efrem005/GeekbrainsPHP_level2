<?php


namespace app\controller;


class ErrorController extends Controller
{

    protected function actionIndex()
    {
        echo $this->render('error/error', ['error' => 'Страница ошибок']);
    }

    protected function actionAdmin()
    {
        echo $this->render('error/error', ['error' => 'Вы не АДМИН доступ закрыт']);
    }

}