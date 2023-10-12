<?php

$host = 'localhost';
$database = 'zadarma';
$username = 'root';
$password = 'test';

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
    $newPassword = password_hash('1', PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $newUsername, PDO::PARAM_STR);
    $stmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $stmt->bindParam(':password', $newPassword, PDO::PARAM_STR);
    $stmt->execute();
    echo "User '$newUsername' added to the 'users' table.<br>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;

