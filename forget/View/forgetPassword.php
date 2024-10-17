<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
</head>
<body>

	<form method="post" action="../controllers/ForgotPasswordController.php" novalidate>
		
		<label for="email">Email</label>
		<input type="email" id="email" name="email" value="<?php echo empty($_SESSION['email']) ? "" : $_SESSION['email']; ?>">
		<span><?php echo empty($_SESSION['err1']) ? "" : $_SESSION['err1']; ?></span>
		<br><br>
		
		<input type="submit" value="Send Reset Link">
	</form>

	<?php echo empty($_SESSION['err2']) ? "" : $_SESSION['err2']; ?>

</body>
</html>
