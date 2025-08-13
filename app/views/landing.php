<?php
$user = $_SESSION['user'];


echo "<h1>Welcome, " . htmlspecialchars($user['name']) . "</h1>";
echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
?>

<!-- logout  -->

<form action="index.php?page=logout" method="POST">
    <button type="submit">Logout</button>
</form>