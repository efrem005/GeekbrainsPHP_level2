<?php

namespace app\controller;

use app\engine\App;
use app\interfaces\IController;
use app\interfaces\IRender;


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
                    'isAuth' => App::call()->usersRepositories->isAuth(),
                    'user' => App::call()->usersRepositories->getName(),
                    'fast_name' => App::call()->usersRepositories->getFastName(),
                    'count' => App::call()->basketRepositories->getCountWhere('session_id', App::call()->session->getId()),
                    'isAdmin' => App::call()->usersRepositories->isAdmin()
                ]),
                'content' => $this->render->renderTemplate($template, $params)
            ]);
        } else {
            return $this->render->renderTemplate($template, $params);
        }
    }
}