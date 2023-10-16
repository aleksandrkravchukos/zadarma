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
            } else {
                $this->redirect('/');
            }
        }
    }

    public function processRegistration()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $valid = $this->validator->validateUserData($_POST);
            if ($valid['valid']) {
                try {
                    $hashedPassword = hash('sha256', $_POST['password']);
                    $query = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                    $query->execute([$_POST['username'], $_POST['email'], $hashedPassword]);
                    $query->fetch();
                    sleep(2); // TODO: send verification email algorithm.
                    $this->redirect('/registered'); // the model if user accept email link
                } catch (\Exception $exception) {
                    $this->redirect('/');
                }
            } else {
                //TODO: create flash errors data and redirect to current page.
                echo 'Data is not valid';
            }
        }
    }
}