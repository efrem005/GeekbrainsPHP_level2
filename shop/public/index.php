<?php
session_start();

include "../config/config.php";
include "../engine/Autoload.php";

use app\engine\{Autoload};

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'index';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_DIR . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}