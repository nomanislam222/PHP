<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../views/styles.css">
</head>
<body>
	<div class="container">

	<form method="post" action="../controllers/LoginController.php" novalidate>
		
		<label>Login</label>
		<input type="email" class="field" name="email" value="<?php echo empty($_SESSION['email']) ? "" :  $_SESSION['email'] ?>" placeholder="Enter your Email">
		<span><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>
		
		<input type="password" class="field" name="password" value="<?php echo empty($_SESSION['password']) ? "" :  $_SESSION['password'] ?>" placeholder="Enter your password">
		<span><?php echo empty($_SESSION['err2']) ? "" :  $_SESSION['err2'] ?></span>
		<br>
		<input type="submit" id="submit" value="Login">
	</form>

	<?php echo empty($_SESSION['err3']) ? "" :  $_SESSION['err3'] ?>
</div>

</body>
</html>