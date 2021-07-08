<?php
session_start();

use app\engine\App;

include '../vendor/autoload.php';
$config = include '../config/config.php';


try {

    App::call()->run($config);

} catch (PDOException | Exception $e){

    file_put_contents("../log/".date("Y_m_d_H_i_s")."_log.txt", $e);

    require('../views/error/error.html');

}