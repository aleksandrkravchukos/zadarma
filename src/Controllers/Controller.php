<?php

class Controller
{
    /**
     * @var PDO|null
     */
    protected ?PDO $pdo = null;

    /**
     * @var Contact
     */
    protected Contact $model;

    /**
     * @var View
     */
    protected View $view;

    public function __construct()
    {
        session_start();
        $pdo = new PdoConnection();
        $this->pdo = $pdo->getPDO();
        $this->model = new Contact();
        $this->view = new View();
    }

    /**
     * @param string $location
     */
    public function redirect(string $location)
    {
        header('Location: ' . $location);
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}