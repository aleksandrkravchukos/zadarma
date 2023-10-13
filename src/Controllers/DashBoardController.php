<?php

class DashBoardController extends Controller
{
//    public function __construct()
//    {
//        $this->index();
//    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/');
            exit;
        } else {
            header('Content-Type: text/html; charset=utf-8');
            include self::VIEW_PATH . 'dashboard.php';
            exit();
        }
    }
}