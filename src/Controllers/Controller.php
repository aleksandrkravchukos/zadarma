<?php

use JetBrains\PhpStorm\ArrayShape;

class Controller
{
    protected string $host = 'localhost';
    protected string $dbname = 'zadarma';
    protected string $username = 'root';
    protected string $password = 'test';
    protected ?PDO $pdo = null;

    public function __construct()
    {
        //phpinfo();
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


}