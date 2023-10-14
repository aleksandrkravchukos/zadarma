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
        'GET' => ['controller' => 'FrontController', 'action' => 'register'],
        'POST' => ['controller' => 'AuthController', 'action' => 'processRegistration']
    ],
    '/registered' => [
        'GET' => ['controller' => 'FrontController', 'action' => 'registered'],
    ],
    '/contacts' => [
        'GET' => ['controller' => 'PhoneBookController', 'action' => 'contactsView'],
        'POST' => ['controller' => 'PhoneBookController', 'action' => 'listContacts'],
    ],
    '/contact' => [
        'POST' => ['controller' => 'PhoneBookController', 'action' => 'contact']
    ],
    '/contact/add' => [
        'POST' => ['controller' => 'PhoneBookController', 'action' => 'addContact']
    ],
    '/contact/update' => [
        'POST' => ['controller' => 'PhoneBookController', 'action' => 'updateContact']
    ],
    '/contact/delete' => [
        'POST' => ['controller' => 'PhoneBookController', 'action' => 'deleteContact']
    ],
    '/avatar/delete' => [
        'POST' => ['controller' => 'PhoneBookController', 'action' => 'deleteAvatar']
    ],
];
