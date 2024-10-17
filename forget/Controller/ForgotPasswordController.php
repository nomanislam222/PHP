<?php 

session_start();

require "../models/User.php";

$email = sanitize($_POST['email']);
$isValid = true;
$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['email'] = "";

if (empty($email)) {
	$_SESSION['err1'] = "Please fill up the email properly";
	$isValid = false;
}
else {
	$_SESSION['email'] = $email;
}

if ($isValid === true) {
	$isUser = findUserByEmail($email);
	if ($isUser) {
		// In a real application, you would send a reset link to the user's email.
		$_SESSION['reset_email'] = $email;
		header("Location: ../views/changePassword.php");
	}
	else {
		$_SESSION['err2'] = "No account found with this email!";
		header("Location: ../views/forgetPassword.php");
	}
} else {
	header("Location: ../views/forgetPassword.php");
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
