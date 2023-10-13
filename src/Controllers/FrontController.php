<?php

class FrontController
{

    const VIEW_PATH = __DIR__ . '/../Views/';

    public function index()
    {
        if (isset($_SESSION['user'])) {
            include self::VIEW_PATH . 'dashboard.php';
            exit;
        } else {
            include self::VIEW_PATH . 'index.php';
        }
    }
}