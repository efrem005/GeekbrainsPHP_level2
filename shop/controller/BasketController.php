<?php

namespace app\controller;

use app\engine\Request;
use app\engine\Session;
use app\models\backet\Basket;
use app\models\product\Product;


class BasketController extends Controller
{
    protected function actionIndex()
    {
        $session_id = (new Session())->getId();
        $basket = Basket::getBasket($session_id);
        $summ = (int)Basket::getSummBasket($session_id);
        echo $this->render('basket', [
            'basket' => $basket,
            'summ' => $summ
        ]);
    }

    public function actionBuy()
    {
//        $id = (new Request())->getParams()['id']; не захотела работать
        $data = json_decode(file_get_contents('php://input'));
        $id = $data->id;
        $user_id = (new Session())->get('id');
        $session_id = (new Session())->getId();
        $product = Product::getOne($id);
        $count = Basket::getBacketOne($id, $session_id);
        if (!empty($count)){
            Basket::getCountUp($count->product_id, $session_id);
            $response = [
                'success' => 'ok',
                'count' => Basket::getCountWhere('session_id', $session_id)
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            die();
        }
        (new Basket($user_id, $product->id, 1, (int)$product->price, $session_id))->save();
        $response = [
            'success' => 'ok',
            'count' => Basket::getCountWhere('session_id', $session_id)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionCountUp()
    {
        $product_id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();
        Basket::getCountUp($product_id, $session_id);
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        die();
    }

    public function actionCountDown()
    {
        $product_id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();
        $backet = Basket::getBacketOne($product_id, $session_id);
        if ($backet->count > 1){
            Basket::getCountDown($product_id, $session_id);
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            die();
        }
        $backet->delete();
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        die();
    }

    public function actionDelete()
    {
        $id = (new Request())->getParams()['id'];
        $backet = Basket::getOne($id);
        $backet->delete();
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        die();
    }

}