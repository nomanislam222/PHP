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

?>