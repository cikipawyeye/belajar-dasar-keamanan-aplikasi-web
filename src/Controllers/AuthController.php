<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->login($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: /");
            } else {
                $error = "Invalid email or password";
                view('auth/login', ['error' => $error]);
            }
        } else {
            if (!isset($_SESSION['user'])) {
                view('auth/login');
            } else {
                header("Location: /");
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /");
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];

            if ($this->model->register($data)) {
                header("Location: /login");
            } else {
                $error = "Registration failed";
                view('auth/register', ['error' => $error]);
            }
        } else {
            if (!isset($_SESSION['user'])) {
                view('auth/register');
            } else {
                header("Location: /");
            }
        }
    }

    public function editProfile()
    {
        $userId = $_SESSION['user']['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email']
            ];

            $newPassword = isset($_POST['password']) && $_POST['password'] != '' ? $_POST['password'] : null;

            if ($this->model->update($userId, $data, $newPassword)) {
                $data['id'] = $userId;
                $_SESSION['user'] = $data;
                header("Location: /");
            }
        } else {
            $user = $this->model->show($userId);

            view('auth/profile', ['user' => $user]);
        }
    }
}
