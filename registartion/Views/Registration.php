<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>

	<form method="post" action="../controllers/RegistrationController.php" novalidate>
		
		<label for="email">Email</label>
		<input type="email" id="email" name="email" value="<?php echo empty($_SESSION['email']) ? "" :  $_SESSION['email'] ?>">
		<span><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>
		<br><br>

		<label for="password">Password</label>
		<input type="password" id="password" name="password" value="<?php echo empty($_SESSION['password']) ? "" :  $_SESSION['password'] ?>">
		<span><?php echo empty($_SESSION['err2']) ? "" :  $_SESSION['err2'] ?></span>
		<br><br>

		<label for="confirm_password">Confirm Password</label>
		<input type="password" id="confirm_password" name="confirm_password" value="<?php echo empty($_SESSION['confirm_password']) ? "" :  $_SESSION['confirm_password'] ?>">
		<span><?php echo empty($_SESSION['err3']) ? "" :  $_SESSION['err3'] ?></span>
		<br><br>

		<input type="submit" value="Register">
	</form>

	<?php echo empty($_SESSION['err4']) ? "" :  $_SESSION['err4'] ?>

</body>
</html>
