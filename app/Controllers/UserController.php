<?php
require_once __DIR__ . '/../Models/User.php';

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function index() {
        $users = $this->userModel->all();
        include __DIR__ . '/../Views/user/list.php';
    }

    public function create() {
        include __DIR__ . '/../Views/user/form.php';
    }

    public function store() {
        $username = $_POST['username'] ?? '';
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data = [
            'username' => $username,
            'password' => $password,
            'nama' => $_POST['nama'] ?? '',
            'email' => $_POST['email'] ?? '',
            'role' => $_POST['role'] ?? 'user',
        ];
        $this->userModel->create($data);
        header('Location: /user');
        exit;
    }

    public function edit($id) {
        $user = $this->userModel->find($id);
        include __DIR__ . '/../Views/user/form.php';
    }

    public function update($id) {
        $data = [
            'username' => $_POST['username'] ?? '',
            'nama' => $_POST['nama'] ?? '',
            'email' => $_POST['email'] ?? '',
            'role' => $_POST['role'] ?? 'user',
        ];

        if (!empty($_POST['password'])) {
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $data);
        header('Location: /user');
        exit;
    }

    public function show($id) {
        $user = $this->userModel->find($id);
        include __DIR__ . '/../Views/user/detail.php';
    }

    public function delete($id) {
        $this->userModel->delete($id);
        header('Location: /user');
        exit;
    }
}
