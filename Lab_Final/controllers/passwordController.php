<?php
session_start();
require "../models/User.php";

$user_id = $_SESSION['user_id'];

$role = getUserRoleById($user_id);
$user = getUserById($user_id);
$cp_db = $user['password']; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cp = $_POST['current_password'];
    $np = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($cp === $cp_db) {
        if (!empty($np) && $np === $confirm_password) {
            $isUpdated = updatePassword($user_id, $np); 
            if ($isUpdated) {
                $_SESSION['msg'] = "Password changed successfully!";
            } else {
                $_SESSION['err'] = "Failed to change password.";
            }
        } else {
            $_SESSION['err'] = "New password and confirmed password do not match.";
        }
    } else {
        $_SESSION['err'] = "Current password is incorrect.";
    }
}
?>