<?php

namespace app\controller;


use app\engine\App;
use app\models\entities\backet\Basket;


class BasketController extends Controller
{
    protected function actionIndex()
    {
        $session_id = App::call()->session->getId();
        $basket = App::call()->basketRepositories->getBasket($session_id);
        $summ = (int)App::call()->basketRepositories->getSummBasket($session_id);
        echo $this->render('basket', [
            'basket' => $basket,
            'summ' => $summ
        ]);
    }

    public function actionBuy()
    {
        $id = App::call()->request->getParams()['id'];
        $user_id = App::call()->session->get('id');
        $session_id = App::call()->session->getId();
        $product = App::call()->productRepositories->getOne($id);
        $count = App::call()->basketRepositories->getBacketOne($id, $session_id);
        if (!empty($count)){
            App::call()->basketRepositories->getCountUp($count->product_id, $session_id);
            $response = [
                'success' => 'ok',
                'count' => App::call()->basketRepositories->getCountWhere('session_id', $session_id)
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            die();
        }
        App::call()->basketRepositories->save((new Basket($user_id, $product->id, 1, (int)$product->price, $session_id)));
        $response = [
            'success' => 'ok',
            'count' => App::call()->basketRepositories->getCountWhere('session_id', $session_id)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionCountUp()
    {
        $product_id = App::call()->request->getParams()['id'];
        $session_id = App::call()->session->getId();
        App::call()->basketRepositories->getCountUp($product_id, $session_id);
        header("Location: " . App::call()->request->getHttpReferer());
        die();
    }

    public function actionCountDown()
    {
        $product_id = App::call()->request->getParams()['id'];
        $session_id = App::call()->session->getId();
        $backet = App::call()->basketRepositories->getBacketOne($product_id, $session_id);
        if ($backet->count > 1){
            App::call()->basketRepositories->getCountDown($product_id, $session_id);
            header("Location: " . App::call()->request->getHttpReferer());
            die();
        }
        App::call()->basketRepositories->delete($backet);
        header("Location: " . App::call()->request->getHttpReferer());
        die();
    }

    public function actionDelete()
    {
        $error = 'ok';
        $id = App::call()->request->getParams()['id'];
        $session_id = App::call()->session->getId();
        $backet = App::call()->basketRepositories->getOne($id);
        if ($session_id == $backet->session_id){
            App::call()->basketRepositories->delete($backet);
        } else {
            $error = 'error';
            throw new \Exception("Ошибка при удаление товара из корзины", 404);
        }
        $response = [
            'secces' => $error,
            'count' => App::call()->basketRepositories->getCountWhere('session_id', $session_id)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

}