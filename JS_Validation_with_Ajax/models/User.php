<?php 

function matchCredentials($pEmail, $pPassword) {

	$conn = mysqli_connect("localhost", "root", "", "my_app");

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT id, email, password FROM users WHERE email = '$pEmail' AND password = '$pPassword'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result); 
		return $row; 
	}
	
	return false;
}

function registerUser($email, $password, $full_name, $contact, $gender) {
    $conn = mysqli_connect("localhost", "root", "", "my_app");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return false; 
    }

    $sql = "INSERT INTO users (email, password, full_name, contact, gender) VALUES ('$email', '$password', '$full_name', '$contact', '$gender')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;
    } 

    return false;
}

function getUserById($user_id) {
    $conn = mysqli_connect("localhost", "root", "", "my_app");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }

    return null;
}

function updateUser($user_id, $full_name, $contact) {
    $conn = mysqli_connect("localhost", "root", "", "my_app");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
	
    $sql = "UPDATE users SET full_name = '$full_name', contact = '$contact' WHERE id = '$user_id'";

    return mysqli_query($conn, $sql);
}

function updatePassword($user_id, $new_password) {
    $conn = new mysqli("localhost", "root", "", "my_app");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET password = '$new_password' WHERE id = $user_id";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true; 
    } else {
        mysqli_close($conn);
        return false; 
    }
}



?>
