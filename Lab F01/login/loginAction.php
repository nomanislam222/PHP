<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_app";

$_SESSION['usernameErr'] = "";
$_SESSION['passwordErr'] = "";
$_SESSION['msg3'] = "";

$email = isset($_POST['username']) ? $_POST['username'] : "";
$pass = isset($_POST['password']) ? $_POST['password'] : "";

$flag = true;

if (empty($email)) {
    $flag = false;
    $_SESSION['usernameErr'] = "Please provide the username";
} else {
    $_SESSION['uname'] = $email;
}

if (empty($pass)) {
    $flag = false;
    $_SESSION['passwordErr'] = "Please provide the password";
} else {
    $_SESSION['pass'] = $pass;
}

if ($flag) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT email, password, status FROM users WHERE email = '$email' and password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row['status'] == 1) {
            $_SESSION['loggedInTime'] = time();
            header("Location: dashboard.php");
        } else {
            $_SESSION['msg3'] = "Your account is deactivated...!";
            header("Location: login.php");
        }
    } else {
        $_SESSION['msg3'] = "Login Failed...!";
        header("Location: login.php");
    }

    $conn->close();
} else {
    header("Location: login.php");
}
exit();

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
