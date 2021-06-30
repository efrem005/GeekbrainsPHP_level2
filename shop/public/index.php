<?php
session_start();

include "../config/config.php";
require '../vendor/autoload.php';

use app\engine\Request;
use app\engine\{Render, TwigRender};

$request = new Request();

$controllerName = $request->getControllerName() ?: 'index';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_DIR . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
}