<?php

class AuthController extends Controller
{

    public function processLogout(): void
    {
        $_SESSION = [];
        session_destroy();
        $this->redirect('/');
    }

    public function processLogin(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = hash('sha256', $_POST['password']);
            $query = $this->pdo->prepare("SELECT * FROM users WHERE email = ? and password = ?");
            $query->execute([$email, $password]);
            $user = $query->fetch();

            if (isset($user['id'])) {
                $_SESSION['user'] = $user;
                $this->redirect('/dashboard');
            }
        }
    }

    public function processRegistration()
    {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        // Hash the password
        //$hashedPassword = hash('sha256',$password);

//        // Insert the user into the database
//        $query = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
//        $query->execute([$username, $email, $hashedPassword]);
//        return $query->rowCount() > 0;
    }
}