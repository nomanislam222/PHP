<?php
session_start();
require "../models/User.php";

if (isset($_GET['current_password'])) {
    $user_id = $_SESSION['user_id'];
    $current_password = $_GET['current_password'];
    $user = getUserById($user_id);
    
    if ($user && $user['password'] === $current_password) {
        echo 'correct';
    } else {
        echo 'incorrect';
    }
}
?>
