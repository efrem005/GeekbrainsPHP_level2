<?php
session_start();

include "../config/config.php";
require '../vendor/autoload.php';

use app\engine\{Render, TwigRender};

$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = $url[1] ?: 'index';
$actionName = $url[2];

$controllerClass = CONTROLLER_DIR . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
}