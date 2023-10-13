<?php

class DashBoardController extends Controller
{
    public function index()
    {
//        echo '<pre>';
//        print_r($_SESSION);
//        echo '</pre>';
//        exit();
        if (!isset($_SESSION['user'])) {
            $this->redirect('/');
            exit;
        } else {
            header('Content-Type: text/html; charset=utf-8');
            include $this->getViewPath() . 'dashboard.php';
            exit();
        }
    }
}