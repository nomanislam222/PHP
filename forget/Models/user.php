<?php 

function findUserByEmail($email) {
	$conn = mysqli_connect("localhost", "root", "", "my_app");

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT id, email FROM users WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) === 1) {
		return true;
	} 
	
	return false;
}

function updatePassword($email, $new_password) {
	$conn = mysqli_connect("localhost", "root", "", "my_app");

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "UPDATE users SET password = '$new_password' WHERE email = '$email'";

	if (mysqli_query($conn, $sql)) {
		return true;
	} 
	
	return false;
}
?>
