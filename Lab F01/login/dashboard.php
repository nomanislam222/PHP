<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Hello, <?php echo $_SESSION['uname']; ?></p>
    <p>Logged In: <?php echo date("l jS \of F Y h:i:s A", $_SESSION['loggedInTime']); ?></p>
    <br>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
