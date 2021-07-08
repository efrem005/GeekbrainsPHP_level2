<?php

namespace app\controller;


use app\engine\Request;
use app\engine\Session;
use app\models\entities\backet\Basket;
use app\models\repositories\backet\BasketRepositories;
use app\models\repositories\product\ProductRepositories;


class BasketController extends Controller
{
    protected function actionIndex()
    {
        $session_id = (new Session())->getId();
        $basket = (new BasketRepositories())->getBasket($session_id);
        $summ = (int)(new BasketRepositories())->getSummBasket($session_id);
        echo $this->render('basket', [
            'basket' => $basket,
            'summ' => $summ
        ]);
    }

    public function actionBuy()
    {
        $id = (new Request())->getParams()['id'];
        $user_id = (new Session())->get('id');
        $session_id = (new Session())->getId();
        $product = (new ProductRepositories())->getOne($id);
        $count = (new BasketRepositories())->getBacketOne($id, $session_id);
        if (!empty($count)){
            (new BasketRepositories())->getCountUp($count->product_id, $session_id);
            $response = [
                'success' => 'ok',
                'count' => (new BasketRepositories())->getCountWhere('session_id', $session_id)
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            die();
        }
        (new BasketRepositories())->save((new Basket($user_id, $product->id, 1, (int)$product->price, $session_id)));
        $response = [
            'success' => 'ok',
            'count' => (new BasketRepositories())->getCountWhere('session_id', $session_id)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionCountUp()
    {
        $product_id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();
        (new BasketRepositories())->getCountUp($product_id, $session_id);
        header("Location: " . (new Request())->getHttpReferer());
        die();
    }

    public function actionCountDown()
    {
        $product_id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();
        $backet = (new BasketRepositories())->getBacketOne($product_id, $session_id);
        if ($backet->count > 1){
            (new BasketRepositories())->getCountDown($product_id, $session_id);
            header("Location: " . (new Request())->getHttpReferer());
            die();
        }
        (new BasketRepositories())->delete($backet);
        header("Location: " . (new Request())->getHttpReferer());
        die();
    }

    public function actionDelete()
    {
        $error = 'ok';
        $id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();
        $backet = (new BasketRepositories())->getOne($id);
        if ($session_id == $backet->session_id){
            (new BasketRepositories())->delete($backet);
        } else {
            $error = 'error';
            throw new \Exception("Ошибка при удаление товара из корзины", 404);
        }
        $response = [
            'secces' => $error,
            'count' => (new BasketRepositories())->getCountWhere('session_id', $session_id)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

}