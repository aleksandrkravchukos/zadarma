<?php

use JetBrains\PhpStorm\NoReturn;

class AuthController extends Controller
{

//    public function __construct($db = null)
//    {
//        $this->db = $db;
//        if (isset($_SESSION['user'])) {
//            header('Location: ' . FrontController::VIEW_PATH . 'dashboard.php');
//            exit;
//        } else {
//            //header('Location: /');
//        }
//    }

    public function processLogout(): void
    {
        $_SESSION = [];
        session_destroy();
        header('Location: /');
    }

    public function processLogin()
    {
        echo '<pre>';
        print_r($_ENV);
        echo '</pre>';
        // Обработать отправленные данные для входа (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Обработать данные формы и выполнить вход
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Retrieve user data from the database based on the provided email
//        $query = $this->db->prepare("SELECT * FROM users WHERE email = ?");
//        $query->execute([$email]);
//        $user = $query->fetch();
//
//        // Check if the user exists and the password is correct
//        if ($user && password_verify($password, $user['password'])) {
//            $_SESSION['user_id'] = $user['id'];
//            return true;
//        }
        }
    }

    public function register()
    {
//        include $this->getViewPath().'register.php';
    }

    public function registerUser($username = null, $email = null, $password = null)
    {
        // Hash the password
        //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//        // Insert the user into the database
//        $query = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
//        $query->execute([$username, $email, $hashedPassword]);
//        return $query->rowCount() > 0;
    }
}