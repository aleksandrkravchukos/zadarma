<?php

class ErrorController extends Controller
{
    public function notFound() {
        header("HTTP/1.0 404 Not Found");
        include $this->view->render('not_found');
    }
}