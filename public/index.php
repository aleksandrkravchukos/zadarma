<?php

$routes = [];
//echo 'TEST'; exit();
require __DIR__.'/../src/routes.php';
require __DIR__.'/../src/bootstrap.php';
require __DIR__ . '/../src/Router.php';

Router::route($_SERVER['REQUEST_URI'], $routes);