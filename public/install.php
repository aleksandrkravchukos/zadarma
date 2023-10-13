<?php

include_once '../src/bootstrap.php';

$host = getenv('DB_HOST');
$database = getenv('DB_NAME');;
$username = getenv('DB_USER');;
$password = getenv('DB_PASS');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";

    $pdo->exec($sql);
    echo "Table 'users' created or already exists.<br>";

    $newUsername = 'user';
    $newEmail = 'admin@admin.com';
    $newPassword = hash('sha256', '1');
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $newUsername, PDO::PARAM_STR);
    $stmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $stmt->bindParam(':password', $newPassword, PDO::PARAM_STR);
    $stmt->execute();
    echo "User '$newUsername' with email '$newEmail' added to the 'users' table.<br>";

    $sql = "
    CREATE TABLE IF NOT EXISTS contacts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        name VARCHAR(50),
        last_name VARCHAR(50),
        email VARCHAR(100),
        image VARCHAR(255),
        FOREIGN KEY (user_id) REFERENCES users(id)
    );
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo "Table 'contacts' created successfully.";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;

