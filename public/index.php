<?php
require_once __DIR__ . "/../app/controllers/UserController.php";

$page = $_GET['page'] ?? 'login';
$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($page === 'register') {
        $controller->register($_POST['name'], $_POST['email'], $_POST['password']);
    } elseif ($page === 'login') {
        $controller->login($_POST['email'], $_POST['password']);
    }
}

if ($page === 'register') {
    require_once __DIR__ . "/../app/views/register.php";
} elseif ($page === 'landing') {
    require_once __DIR__ . "/../app/views/landing.php";
}elseif ($page === 'logout') {
    session_start();
    session_destroy();
    header("Location: index.php?page=login");
    exit;
}
else {
    require_once __DIR__ . "/../app/views/login.php";
}
