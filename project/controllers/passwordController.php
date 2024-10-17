<?php
require_once '../models/User.php';

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        $user = new User();
        if ($user->verifyOldPassword($_SESSION['user_id'], $old_password)) {
            if ($user->changePassword($_SESSION['user_id'], $new_password)) {
                $_SESSION['msg'] = "Password changed successfully!";
                header("Location: ../views/changepass.php");
            } else {
                $_SESSION['err'] = "Failed to change password.";
                header("Location: ../views/changepass.php");
            }
        } else {
            $_SESSION['err'] = "Old password is incorrect.";
            header("Location: ../views/changepass.php");
        }
    } else {
        $_SESSION['err'] = "New passwords do not match.";
        header("Location: ../views/changepass.php");
    }
}
?>
