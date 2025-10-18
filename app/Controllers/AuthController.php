<?php
require_once __DIR__ . '/../Models/User.php';

class AuthController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
        // HAPUS session_start() — cukup dijalankan di index.php
    }

    public function showLogin() {
        include __DIR__ . '/../Views/auth/login.php';
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role']
            ];
            header('Location: /user'); 
            exit;
        } else {
            $error = "Username / password salah";
            include __DIR__ . '/../Views/auth/login.php';
        }
    }

    public function showRegister() {
        include __DIR__ . '/../Views/auth/register.php';
    }

    public function register() {
        $username = $_POST['username'] ?? '';
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data = [
            'username' => $username,
            'password' => $password,
            'nama' => $_POST['nama'] ?? '',
            'email' => $_POST['email'] ?? '',
            'role' => 'user'
        ];
        $this->userModel->create($data);
        header('Location: /auth/login');
        exit;
    }

    public function logout() {
        // Tidak perlu session_start() ulang, session sudah aktif
        session_unset();
        session_destroy();
        header('Location: /auth/login');
        exit;
    }
}
