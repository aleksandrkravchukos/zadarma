<?php
require 'controller.php';
include __DIR__.'/Controller/AuthController.php';
$model = new AuthController();
$model->register();
