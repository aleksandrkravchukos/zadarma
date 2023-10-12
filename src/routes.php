<?php

$routes = [
    '/' => ['GET' => ['controller' => 'FrontController', 'action' => 'index']],
    '/dashboard' => ['GET' => ['controller' => 'DashBoardController', 'action' => 'index']],
    '/login' => [
        'POST' => ['controller' => 'AuthController', 'action' => 'processLogin']
    ],
    '/logout' => [
        'POST' => ['controller' => 'AuthController', 'action' => 'processLogout']
    ],
    '/register' => [
        'GET' => ['controller' => 'AuthController', 'action' => 'register'],
        'POST' => ['controller' => 'AuthController', 'action' => 'processRegistration']
    ],
    '/contacts' => [
        'GET' =>
            [
                'controller' => 'PhoneBookController',
                'action' => 'listContacts'
            ]
    ],
];
