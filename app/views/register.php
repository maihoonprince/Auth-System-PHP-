<form method="POST" action="index.php?page=register">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

 <!-- Redirect to Login Page  -->

<p>Already have an account?</p>
<a href="index.php?page=login">
    <button type="button">Login</button>
</a>