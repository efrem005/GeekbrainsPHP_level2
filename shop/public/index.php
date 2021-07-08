<?php
session_start();

include "../config/config.php";
require '../vendor/autoload.php';

use app\controller\IndexController;
use app\engine\Request;
use app\engine\{Render, TwigRender};

try {
    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'index';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER_DIR . ucfirst($controllerName) . 'Controller';

    if (class_exists($controllerClass)) {
        (new $controllerClass(new Render()))->runAction($actionName);
    } else {
        (new IndexController(new Render()))->error();
    }
} catch (PDOException | Exception $e){
    file_put_contents("../log/".date("Y_m_d_H_i_s")."_log.txt", $e);
    require('../views/error/error.html');
}