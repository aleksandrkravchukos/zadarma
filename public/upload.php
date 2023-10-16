<?php

require __DIR__.'/../src/routes.php';
require __DIR__.'/../src/bootstrap.php';
require __DIR__ . '/../src/Router.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES["image"]["error"] == 0) {
    if (isset($_FILES['image'])) {
        $controller = new PhoneBookController();
        $controller->processUploadedFile($_FILES, $_POST['contactId']);
    }
}