<?php 
session_start(); 
if (empty($_SESSION['isLoggedIn'])) {
	$_SESSION['err3'] = "Unauthorized Access...!";
	header("Location: Login.php");
	die();
}
else if ($_SESSION['isLoggedIn'] === false) {
	$_SESSION['err3'] = "Unauthorized Access...!";
	header("Location: Login.php");
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>

	<h1>Hello, <?php echo $_SESSION['email']; ?></h1>

	<hr>	

	<a href="../controllers/Logout.php">Logout</a>

</body>
</html>