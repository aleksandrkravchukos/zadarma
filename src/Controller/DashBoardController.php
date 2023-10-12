<?php

class DashBoardController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . 'index.php');
            exit;
        } else {
            include parent::getViewPath().'/dashboard.php';
        }
    }
}