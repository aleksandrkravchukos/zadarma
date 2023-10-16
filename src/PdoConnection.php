<?php

class PdoConnection
{
    /**
     * @var string|array|false
     */
    protected string|bool|array $host;

    /**
     * @var string|array|false
     */
    protected string|bool|array $dbname;

    /**
     * @var string|array|false
     */
    protected string|bool|array $username;

    /**
     * @var string|array|false
     */
    protected string|bool|array $password;

    /**
     * @var PDO|null
     */
    protected ?PDO $pdo = null;

    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->dbname = getenv('DB_NAME');
        $this->username = getenv('DB_USER');
        $this->password = getenv('DB_PASS');
    }

    /**
     * Get PDO connection.
     *
     * @return PDO
     */
    public function getPDO(): PDO
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $this->pdo;
    }
}