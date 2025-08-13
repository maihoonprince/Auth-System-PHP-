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
    elseif ($page === 'logout') {
        session_start();
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Auth System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
if ($page === 'register') {
    require_once __DIR__ . "/../app/views/register.php";
} elseif ($page === 'landing') {
    require_once __DIR__ . "/../app/views/landing.php";
} else {
    require_once __DIR__ . "/../app/views/login.php";
}
?>

</body>
</html>
