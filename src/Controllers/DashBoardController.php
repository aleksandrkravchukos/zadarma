<?php

class DashBoardController extends Controller
{
//    public function __construct()
//    {
//        $this->index();
//    }

    const VIEW_PATH = __DIR__ . '/../Views/';

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
            exit;
        } else {
            header('Content-Type: text/html; charset=utf-8');
            include self::VIEW_PATH . 'dashboard.php';
            exit();
        }
    }
}