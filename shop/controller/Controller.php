<?php

namespace app\controller;


use app\interfaces\IController;


abstract class Controller implements IController
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = false;

    private $render;

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function runAction($action) {
        $this->action = $action ?? $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die('404 error action');
        }
    }

    protected function render($template, $params = []) {
        if ($this->useLayout) {
            return $this->render->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->render->renderTemplate('menu', $params),
                'content' => $this->render->renderTemplate($template, $params)
            ]);
        } else {
            return $this->render->renderTemplate($template, $params);
        }
    }
}