<?php

class FrontController
{

    const VIEW_PATH = __DIR__ . '/../Views/';

    public function index()
    {
        echo 1;
        if (isset($_SESSION['user'])) {
            echo 2;
            exit();
            header('Location: ' . self::VIEW_PATH . 'dashboard.php');
            exit;
        } else {
            include self::VIEW_PATH . 'index.php';
        }
    }
}