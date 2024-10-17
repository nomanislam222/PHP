<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
</head>
<body>

	<form method="post" action="../controllers/ChangePasswordController.php" novalidate>
		
		<label for="new_password">New Password</label>
		<input type="password" id="new_password" name="new_password">
		<span><?php echo empty($_SESSION['err1']) ? "" : $_SESSION['err1']; ?></span>
		<br><br>

		<label for="confirm_password">Confirm New Password</label>
		<input type="password" id="confirm_password" name="confirm_password">
		<span><?php echo empty($_SESSION['err2']) ? "" : $_SESSION['err2']; ?></span>
		<br><br>

		<input type="submit" value="Change Password">
	</form>

	<?php echo empty($_SESSION['err3']) ? "" : $_SESSION['err3']; ?>

</body>
</html>
