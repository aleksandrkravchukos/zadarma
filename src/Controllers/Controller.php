<?php

class Controller
{
    protected string $host;
    protected string $dbname;
    protected string $username;
    protected string $password;
    protected ?PDO $pdo = null;

    protected $model;

    const VIEW_PATH = __DIR__ . '/../Views/';

    public function __construct(PhoneBookModel $model)
    {
        session_start();
        $this->model = $model;
        $this->host = getenv('DB_HOST');
        $this->dbname = getenv('DB_NAME');
        $this->username = getenv('DB_USER');
        $this->password = getenv('DB_PASS');

        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function redirect(string $location)
    {
        header('Location: ' . $location);
    }
}