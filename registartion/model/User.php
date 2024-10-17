<?php 

function matchCredentials($pEmail, $pPassword) {
	$conn = mysqli_connect("localhost", "root", "", "my_app");

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT id, email, password FROM users WHERE email = '$pEmail' and password = '$pPassword'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) === 1) {
		return true;
	} 
	
	return false;
}

function registerUser($email, $password) {
	$conn = mysqli_connect("localhost", "root", "", "my_app");

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	// Check if email already exists
	$sql = "SELECT id FROM users WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		return false; // User already exists
	}

	// Insert user into database
	$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
	$result = mysqli_query($conn, $sql);

	if ($result) {
		return true; // User registered successfully
	} 
	
	return false;
}

?>
