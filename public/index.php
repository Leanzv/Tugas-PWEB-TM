<?php

require_once __DIR__ . '/../config/config.php';
$config = include __DIR__ . '/../config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['dbname']};charset={$config['db']['charset']}";
$pdo = new PDO($dsn, $config['db']['user'], $config['db']['pass'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

require_once __DIR__ . '/../app/Controllers/UserController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';

$path = $_GET['url'] ?? '';
$parts = array_values(array_filter(explode('/', $path)));

$controller = $parts[0] ?? 'user';
$action = $parts[1] ?? 'index';
$id = $parts[2] ?? null;

$userCtrl = new UserController($pdo);
$authCtrl = new AuthController($pdo);

if ($controller === 'auth' && isset($parts[1]) && $parts[1] === 'login') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') $authCtrl->login();
    else $authCtrl->showLogin();

} elseif ($controller === 'auth' && isset($parts[1]) && $parts[1] === 'register') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') $authCtrl->register();
    else $authCtrl->showRegister();

} elseif ($controller === 'logout') {
    $authCtrl->logout();

} elseif ($controller === 'user') {
    if (!isset($_SESSION['user'])) {
        header('Location: /auth/login');
        exit;
    }

    switch ($action) {
        case 'index':
            $userCtrl->index();
            break;
        case 'create':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') $userCtrl->store();
            else $userCtrl->create();
            break;
        case 'edit':
            if (!$id) { header('Location: /user'); exit; }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') $userCtrl->update($id);
            else $userCtrl->edit($id);
            break;
        case 'show':
            $userCtrl->show($id);
            break;
        case 'delete':
            $userCtrl->delete($id);
            break;
        default:
            $userCtrl->index();
            break;
    }

} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 - Not Found";
}
