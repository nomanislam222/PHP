<?php
header('Content-Type: application/json');
require "../models/User.php";

$email = sanitize($_GET['email']);
$response = ['exists' => false];

if (!empty($email)) {
    $conn = mysqli_connect("localhost", "root", "", "my_app");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $response['exists'] = true; 
    }

    mysqli_close($conn);
}

echo json_encode($response);

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
