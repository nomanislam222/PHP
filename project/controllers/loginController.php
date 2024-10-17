<?php
require_once '../models/User.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $user = new User();
    $loggedInUser = $user->login($email, $password);

    if ($loggedInUser) {
        $_SESSION['user_id'] = $loggedInUser['id'];
        header("Location: ../views/profile.php");
    } else {
        $_SESSION['err'] = "Invalid email or password.";
        header("Location: ../views/login.php");
    }
}
?>
