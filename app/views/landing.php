<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}

$user = $_SESSION['user'];
?>
<div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>

    <form action="index.php?page=logout" method="POST">
        <button type="submit">Logout</button>
    </form>
</div>
