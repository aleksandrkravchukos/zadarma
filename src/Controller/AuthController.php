<?php

class AuthController extends Controller
{
    private $db;

    public function __construct($db = null)
    {
        $this->db = $db;
        if (isset($_SESSION['user'])) {
            header('Location: ' . parent::getViewPath() . 'dashboard.php');
            exit;
        } else {
            //header('Location: /');
        }
    }

    public function index()
    {
        include __DIR__ . '/../resources/view/front/login.php';
    }

    public function register()
    {
        include __DIR__ . '/../resources/view/front/register.php';
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

    public function login($email, $password)
    {
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
        return false;
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: /');
        exit;
    }
}