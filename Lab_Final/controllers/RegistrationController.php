<?php 

session_start();
require "../models/User.php";

$email = sanitize($_POST['email']);
$full_name = sanitize($_POST['full_name']);
$contact = sanitize($_POST['contact']);
$password = sanitize($_POST['password']);
$confirm_password = sanitize($_POST['confirm_password']);
$gender = isset($_POST['gender']) ? sanitize($_POST['gender']) : "";
$role = isset($_POST['role']) ? sanitize($_POST['role']) : "";

$isValid = true;

$_SESSION['err1'] = ""; 
$_SESSION['err2'] = ""; 
$_SESSION['err3'] = ""; 
$_SESSION['err4'] = "";
$_SESSION['err5'] = ""; 
$_SESSION['err6'] = ""; 
$_SESSION['err7'] = ""; 
$_SESSION['err8'] = ""; 
$_SESSION['email'] = "";
$_SESSION['full_name'] = "";
$_SESSION['contact'] = "";
$_SESSION['password'] = "";
$_SESSION['gender'] = "";
$_SESSION['role'] = "";

if (empty($email)) {
	$_SESSION['err1'] = "Please fill up the email properly.";
	$isValid = false;
} else {
	$_SESSION['email'] = $email;
}

if (empty($full_name)) {
	$_SESSION['err2'] = "Please enter your full name.";
	$isValid = false;
} else {
	$_SESSION['full_name'] = $full_name;
}

if (empty($contact)) {
	$_SESSION['err3'] = "Please enter your contact number.";
	$isValid = false;
} else {
	$_SESSION['contact'] = $contact;
}

if (empty($password)) {
	$_SESSION['err4'] = "Please fill up the password properly.";
	$isValid = false;
} elseif ($password !== $confirm_password) {
	$_SESSION['err5'] = "Passwords do not match.";
	$isValid = false;
} else {
	$_SESSION['password'] = $password;
}

if (empty($gender)) {
	$_SESSION['err6'] = "Please select your gender.";
	$isValid = false;
} else {
	$_SESSION['gender'] = $gender;
}

if (empty($role)) {
	$_SESSION['err8'] = "Please select your role.";
	$isValid = false;
} else {
	$_SESSION['role'] = $role;
}

if ($isValid === true) {
	$isRegistered = registerUser($email, $password, $full_name, $contact, $gender, $role); 
	if ($isRegistered) {
		session_unset();
		session_destroy();
		header("Location: ../views/Login.php");
		exit();
	} else {
		$_SESSION['err7'] = "Registration Failed! Email already exists.";
		header("Location: ../views/Registration.php");
		exit();
	}
} else {
	header("Location: ../views/Registration.php");
	exit();
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
