<?php
session_start();
require "../models/User.php";

$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);

$isValid = true;
$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";

if (empty($email)) {
    $_SESSION['err1'] = "Please fill up the email properly";
    $isValid = false;
}

if (empty($password)) {
    $_SESSION['err2'] = "Please fill up the password properly";
    $isValid = false;
}

if ($isValid) {
    if (matchCredentials($email, $password)) {
        $_SESSION['isLoggedIn'] = true;
        header("Location: ../views/index.php");
    } else {
        $_SESSION['err3'] = "Login Failed. Invalid email or password!";
        header("Location: ../views/login.php");
    }
} else {
    header("Location: ../views/login.php");
}

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
