<?php

namespace app\controller;

use app\engine\Session;
use app\interfaces\IController;
use app\interfaces\IRender;
use app\models\repositories\backet\BasketRepositories;
use app\models\repositories\user\UsersRepositories;


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

    public function error()
    {
        echo $this->render('error/error', ['error' => 'Контроллер не найден']);
    }

    public function runAction($action)
    {
        $this->action = $action ?? $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo $this->render('error/error', ['error' => 'Акшен не найден']);
        }
    }

    protected function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->render->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->render->renderTemplate('menu', [
                    'isAuth' => (new UsersRepositories())->isAuth(),
                    'user' => (new UsersRepositories())->getName(),
                    'fast_name' => (new UsersRepositories())->getFastName(),
                    'count' => (new BasketRepositories())->getCountWhere('session_id', (new Session())->getId()),
                    'isAdmin' => (new UsersRepositories())->isAdmin()
                ]),
                'content' => $this->render->renderTemplate($template, $params)
            ]);
        } else {
            return $this->render->renderTemplate($template, $params);
        }
    }
}