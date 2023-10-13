<?php

class DashBoardController extends Controller
{
//    public function __construct()
//    {
//        $this->index();
//    }

    public function index()
    {
        echo 'DASH';
        exit();
        if (!isset($_SESSION['user'])) {
            header('Location: /');
            exit;
        } else {
            header('Location: ' . FrontController::VIEW_PATH.'/dashboard.php');
            exit();
        }
    }
}