<?php

class Controller
{
    protected ?PDO $pdo = null;

    protected Contact $model;

    public function __construct()
    {
        session_start();
        $pdo = new PdoConnection();
        $this->pdo = $pdo->getPDO();
        $this->model = new Contact();
    }

    public function redirect(string $location)
    {
        header('Location: ' . $location);
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/../Views/';
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}