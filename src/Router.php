<?php

require_once __DIR__ . '/Controllers/Controller.php';
require_once __DIR__ . '/Controllers/FrontController.php';
require_once __DIR__ . '/Controllers/DashBoardController.php';
require_once __DIR__ . '/Controllers/AuthController.php';
require_once __DIR__ . '/Controllers/ErrorController.php';


class Router
{
    public static function route($url, $routes)
    {
        $routeInfo = $routes[$url] ?? ['GET' => ['controller' => 'ErrorController', 'action' => 'notFound']];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $controllerAction = $routeInfo[$requestMethod] ?? ['controller' => 'ErrorController', 'action' => 'notFound'];
        $controller = $controllerAction['controller'];
        $action = $controllerAction['action'];
        $controllerInstance = new $controller();
        $controllerInstance->$action();
    }
}
