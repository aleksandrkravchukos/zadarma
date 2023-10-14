<?php

require __DIR__.'/../src/routes.php';
require __DIR__.'/../src/bootstrap.php';
require __DIR__ . '/../src/Router.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES["image"]["error"] == 0) {
//    echo '<pre>';
//    print_r($_FILES);
//    echo '</pre>';
    if (isset($_FILES['image'])) {
        $controller = new PhoneBookController();
        $controller->processUploadedFile($_FILES, $_POST['contactId']);
    }
}