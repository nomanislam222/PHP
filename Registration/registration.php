<?php
session_start();
require_once 'RegistrationController.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_app";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    $_SESSION['dbConnected'] = "Connection failed: " . mysqli_connect_error();
    header("Location: registration.php");
    exit;
} else {
    $_SESSION['dbConnected'] = "Connected successfully";
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'register':
        $controller = new RegistrationController($conn);
        $controller->registrationAction();
        break;
    default:
        displayForm();
}
function displayForm() {
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
</head>
<body>
    <fieldset>
        <legend>Registration</legend>
        <form action="index.php?action=register" method="post" novalidate>
            <label for="username">Username</label>
            <input type="text" name="email" id="username">
            <?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : "" ?>
            <br><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
            <br><br>

            <input type="submit" value="Register">
        </form>
    </fieldset>
    <?php if (isset($_SESSION['msg'])) { ?>
        <p><?php echo $_SESSION['msg']; ?></p>
    <?php } ?>
</body>
</html>
<?php
$_SESSION['usernameErr'] = "";
$_SESSION['passwordErr'] = "";
$_SESSION['msg'] = "";
}
?>
