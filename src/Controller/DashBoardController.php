<?php

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->index();
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . 'index.php');
            exit;
        } else {
            echo parent::getViewPath().'/dashboard.php';
//            include parent::getViewPath().'/dashboard.php';
        }
    }
}