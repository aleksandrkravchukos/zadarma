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

    protected Validator $validator;

    /**
     * @var View
     */
    protected View $view;

    public function __construct()
    {
        //TODO: need create dependency injection Services, Models, Repositories etc
        // with autowired for SOLID principles.

        session_start();
        $pdo = new PdoConnection();
        $this->pdo = $pdo->getPDO();
        $this->model = new Contact();
        $this->view = new View();
        $this->validator = new Validator();
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