<?php

class Controller
{
    protected ?PDO $pdo = null;

    protected PhoneBook $model;

    public function __construct()
    {
        session_start();
        $pdo = new PdoConnection();
        $this->pdo = $pdo->getPDO();
        $this->model = new PhoneBook();
    }

    public function redirect(string $location)
    {
        header('Location: ' . $location);
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/../Views/';
    }
}