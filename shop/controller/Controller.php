<?php

namespace app\controller;


use app\engine\Session;
use app\interfaces\IController;
use app\interfaces\IRender;
use app\models\backet\Basket;
use app\models\user\Users;


abstract class Controller implements IController
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    private $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }

    public function runAction($action)
    {
        $this->action = $action ?? $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die('404 error action');
        }
    }

    protected function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->render->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->render->renderTemplate('menu', [
                    'isAuth' => Users::isAuth(),
                    'user' => Users::getName(),
                    'fast_name' => Users::getFastName(),
                    'count' => Basket::getCountWhere('session_id', (new Session())->getId()),
                    'isAdmin' => Users::isAdmin()
                ]),
                'content' => $this->render->renderTemplate($template, $params)
            ]);
        } else {
            return $this->render->renderTemplate($template, $params);
        }
    }
}