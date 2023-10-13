<?php

class FrontController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user'])) {
            include $this->getViewPath() . 'dashboard.php';
            exit;
        } else {
            include $this->getViewPath() . 'index.php';
        }
    }
}