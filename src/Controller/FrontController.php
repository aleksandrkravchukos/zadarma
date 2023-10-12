<?php

class FrontController extends Controller
{
    public function __construct()
    {
        $this->index();
    }

    public function index()
    {

        if (isset($_SESSION['user'])) {
            header('Location: ' . parent::getViewPath() . 'dashboard.php');
            exit;
        } else {
            include __DIR__.'/../resources/view/front/index.php';
        }
    }
}