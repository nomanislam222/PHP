<?php
require_once '../models/User.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $contact = trim($_POST['contact']);
    $gender = $_POST['gender'];

    if ($password === $confirm_password) {
        $user = new User();
        if ($user->checkEmailExists($email)) {
            $_SESSION['err'] = "Email already exists.";
            header("Location: ../views/register.php");
            exit;
        }

        if ($user->register($full_name, $email, $password, $contact, $gender)) {
            $_SESSION['msg'] = "Registration successful! Please login.";
            header("Location: ../views/login.php");
        } else {
            $_SESSION['err'] = "Failed to register. Try again.";
            header("Location: ../views/register.php");
        }
    } else {
        $_SESSION['err'] = "Passwords do not match!";
        header("Location: ../views/register.php");
    }
}
?>
