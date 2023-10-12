<?php

require_once __DIR__ . '/Controllers/FrontController.php';
require_once __DIR__ . '/Controllers/DashBoardController.php';
require_once __DIR__ . '/Controllers/AuthController.php';
require_once __DIR__ . '/Controllers/Controller.php';

class Router
{
    public static function route($url, $routes)
    {
//        echo '<pre>';
//        print_r($routes);
//        echo '</pre>';
//        exit();
        // Parse URL and find the appropriate controller and action
        $routeInfo = $routes[$url] ?? ['GET' => ['controller' => 'ErrorController', 'action' => 'notFound']];

//        echo '<pre>';
//        print_r($routeInfo);
//        echo '</pre>';
//        exit();

        // Ensure that the request method (GET or POST) is set to the correct action
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $controllerAction = $routeInfo[$requestMethod] ?? ['controller' => 'ErrorController', 'action' => 'notFound'];

        // Extract the controller and action
        $controller = $controllerAction['controller'];
        $action = $controllerAction['action'];

        // Instantiate the controller and call the action
        $controllerInstance = new $controller();
        $controllerInstance->$action();
    }
}
