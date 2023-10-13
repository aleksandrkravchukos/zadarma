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

    public function processLogin(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = hash('sha256', $_POST['password']);
            $query = $this->pdo->prepare("SELECT * FROM users WHERE email = ? and password = ?");
            $query->execute([$email, $password]);
            $user = $query->fetch();
            if ($user) {
                $_SESSION['user'] = $user['id'];
                header('Location: /dashboard');
            }
        }
    }

    public function register()
    {
//        include $this->getViewPath().'register.php';
    }

    public function registerUser($username = null, $email = null, $password = null)
    {
        // Hash the password
        //$hashedPassword = hash('sha256',$password);

//        // Insert the user into the database
//        $query = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
//        $query->execute([$username, $email, $hashedPassword]);
//        return $query->rowCount() > 0;
    }
}