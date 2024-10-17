<?php 

session_start();

require "../models/User.php";

$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);
$confirm_password = sanitize($_POST['confirm_password']);
$isValid = true;

$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";
$_SESSION['err4'] = "";
$_SESSION['email'] = "";
$_SESSION['password'] = "";

if (empty($email)) {
	$_SESSION['err1'] = "Please fill up the email properly";
	$isValid = false;
}
else {
	$_SESSION['email'] = $email;
}

if (empty($password)) {
	$_SESSION['err2'] = "Please fill up the password properly";
	$isValid = false;
}

if ($password !== $confirm_password) {
	$_SESSION['err3'] = "Passwords do not match";
	$isValid = false;
}
else {
	$_SESSION['password'] = $password;
}

if ($isValid === true) {
	$isRegistered = registerUser($email, $password);
	if ($isRegistered) {
		header("Location: ../views/Login.php");
	}
	else {
		$_SESSION['err4'] = "Registration Failed! Email already exists.";
		header("Location: ../views/Registration.php");
	}
} else {
	header("Location: ../views/Registration.php");
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
