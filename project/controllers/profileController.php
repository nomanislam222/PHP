<?php
require_once '../models/User.php';

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php");
    exit;
}

$user = new User();
$currentUser = $user->getUserById($_SESSION['user_id']);

// This controller is no longer handling POST requests for profile updates via AJAX
// So we can remove POST handling here or keep it for non-AJAX submissions
?>
