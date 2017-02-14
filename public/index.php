<?php

require_once "../vendor/autoload.php";
require_once "../src/Exceptions/Exceptions.php";

use App\Config\Db;
use App\Core\Dispatcher;
use App\Exceptions\ControllerNotFoundException;

set_exception_handler("exceptions");

$db = new Db();
$dispatcher = new Dispatcher();
$dispatcher->dispatch();

$controller = "App\Controllers\\".$dispatcher->getController();
if(!class_exists($controller)) {    
    throw new ControllerNotFoundException($dispatcher->getController());    
}

$controller = new $controller($db->getConn());
call_user_func_array([$controller, $dispatcher->getMethod()], $dispatcher->getArgs());