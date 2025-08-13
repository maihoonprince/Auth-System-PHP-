<?php
session_start();
require_once __DIR__ . "/../../config/Database.php";
require_once __DIR__ . "/../models/User.php";

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->user = new User($this->db);
    }

    public function register($name, $email, $password) {
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->password = password_hash($password, PASSWORD_DEFAULT);

        if ($this->user->register()) {
            header("Location: /auth_system/public/index.php?success=registered");
        }
    }

    public function login($email, $password) {
        $this->user->email = $email;
        $stmt = $this->user->login();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: /auth_system/public/index.php?page=landing");
        } else {
            header("Location: /auth_system/public/index.php?error=invalid");
        }
    }
}
