<?php
session_start();
require "../models/User.php";

$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);
$confirmPassword = sanitize($_POST['confirm_password']);

$isValid = true;
$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";
$_SESSION['err4'] = "";

if (empty($email)) {
    $_SESSION['err1'] = "Please fill up the email properly";
    $isValid = false;
}

if (empty($password)) {
    $_SESSION['err2'] = "Please fill up the password properly";
    $isValid = false;
}

if ($password !== $confirmPassword) {
    $_SESSION['err3'] = "Passwords do not match";
    $isValid = false;
}

if ($isValid) {
    if (registerUser($email, $password)) {
        header("Location: ../views/login.php");
    } else {
        $_SESSION['err4'] = "Registration Failed! Email already exists.";
        header("Location: ../views/registration.php");
    }
} else {
    header("Location: ../views/registration.php");
}

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
