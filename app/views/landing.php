<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}
$user = $_SESSION['user'];
echo "<h1>Welcome, " . htmlspecialchars($user['name']) . "</h1>";
echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
