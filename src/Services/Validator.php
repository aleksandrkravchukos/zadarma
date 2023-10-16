<?php

use JetBrains\PhpStorm\ArrayShape;

class Validator
{

    #[ArrayShape(['valid' => "bool", 'errors' => "array"])] public function validateContactData($postData): array
    {
        $errors = [];
        $userName = $postData['name'];
        $lastName = $postData['last_name'];
        $phone = $postData['phone'];
        $email = $postData['email'];

        if (empty($userName)) {
            $errors['username'] = 'Username is required';
        }
        if (empty($lastName)) {
            $errors['lastName'] = 'Last name is required';
        }

        if (empty($phone)) {
            $errors['phone'] = 'Phone is required';
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid or missing email';
        }

        //TODO: create another validation rules(need some time for this).

        return [
            'valid' => empty($errors),
            'errors' => $errors,
        ];
    }

    #[ArrayShape(['valid' => "bool", 'errors' => "array"])] public function validateUserData($postData): array
    {
        $errors = [];
        $login = $postData['username'];
        $email = $postData['email'];
        $password = $postData['password'];

        if (empty($login)) {
            $errors['username'] = 'Login is required';
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required';
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid or missing email';
        }

        //TODO: create another validation rules(need some time for this).

        return [
            'valid' => empty($errors),
            'errors' => $errors,
        ];
    }
}