<?php

    header('Content-type: text/html; charset=UTF-8');

    //Connect Redis
    try {
        require '../libs/predis/autoload.php';
        Predis\Autoloader::register();
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }

    //Find controller for work
    $className = ucfirst(strtolower(explode('/', $_SERVER['REQUEST_URI'])[1]));
    $controllerName = $className . 'Controller';
    if (file_exists($controllerName .'.php')) {
        try {
            require_once $controllerName . '.php';
            $api = new $controllerName();
            echo $api->run();
        } catch (Exception $e) {
            echo json_encode(Array('error' => $e->getMessage()));
        }
}
?>