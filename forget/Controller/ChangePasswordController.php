<?php 

session_start();

require "../models/User.php";

$new_password = sanitize($_POST['new_password']);
$confirm_password = sanitize($_POST['confirm_password']);
$isValid = true;
$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";

if (empty($new_password)) {
	$_SESSION['err1'] = "Please fill up the new password properly";
	$isValid = false;
}

if ($new_password !== $confirm_password) {
	$_SESSION['err2'] = "Passwords do not match!";
	$isValid = false;
}

if ($isValid === true) {
	$email = $_SESSION['reset_email']; 
	$isPasswordUpdated = updatePassword($email, $new_password);

	if ($isPasswordUpdated) {
		session_destroy();
		header("Location: ../views/login.php"); 
	} else {
		$_SESSION['err3'] = "Failed to update password.";
		header("Location: ../views/changePassword.php");
	}
} else {
	header("Location: ../views/changePassword.php");
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
