<?php

class FrontController extends Controller
{
    /**
     * Show index html or user dashboard.
     */
    public function index()
    {
        if (isset($_SESSION['user'])) {
            include $this->view->render('dashboard');
            exit;
        } else {
            include $this->view->render('index');
        }
    }

    /**
     * Show html register form.
     */
    public function register()
    {
        include $this->view->render('register');
    }

    /**
     * Show html after user registered.
     */
    public function registered()
    {
        include $this->view->render('registered');
    }
}