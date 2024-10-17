<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require "../models/User.php"; 

$user_id = $_SESSION['user_id'];

$user = getUserById($user_id);

$email = $user['email'];
$full_name = $user['full_name'];
$contact = $user['contact'];
$gender = $user['gender'];
$role = $user['role'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $contact = $_POST['contact'];

    if (!empty($full_name) && !empty($contact)) {
        $isUpdated = updateUser($user_id, $full_name, $contact);

        if ($isUpdated) {
            $_SESSION['msg'] = "Profile updated successfully!";
        } else {
            $_SESSION['err'] = "Failed to update profile.";
        }
    } else {
        $_SESSION['err'] = "All fields are required.";
    }

    header("Location: ../views/profile.php");
    exit();
}
?>
