<?php

class ErrorController
{
    public function notFound() {
        header("HTTP/1.0 404 Not Found");
        echo '404 - Page not found';
    }
}