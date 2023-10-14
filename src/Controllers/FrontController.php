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

    public function register()
    {
        include $this->getViewPath().'register.php';
    }

    public function registered()
    {
        include $this->getViewPath().'registered.php';
    }
}