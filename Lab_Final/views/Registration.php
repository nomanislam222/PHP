<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
		<script type="text/javascript" src="../views/js/registration.js"></script>
    <script type="text/javascript" src="../views/js/ajax.js"></script>


</head>
<body>
  <a href="../views/login.php">Login</a>
<div class="container">

	<form method="post" action="../controllers/RegistrationController.php" onsubmit="return isValid(this);" novalidate>
		
		<label>Registration Form</label>
		<input type="email" class="field" id="email"  name="email" value="<?php echo empty($_SESSION['email']) ? "" :  $_SESSION['email'] ?>" Placeholder=" Enter Your Email" onblur="checkEmailExists()">
		<span><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>
		
		<input type="text" class="field" name="full_name" value="<?php echo empty($_SESSION['full_name']) ? "" :  $_SESSION['full_name'] ?>" placeholder="Enter Your Full Name">
		<span><?php echo empty($_SESSION['err2']) ? "" :  $_SESSION['err2'] ?></span>
		
		<input type="text" class="field" name="contact" value="<?php echo empty($_SESSION['contact']) ? "" :  $_SESSION['contact'] ?>" placeholder="Enter Your Phone Number">
		<span><?php echo empty($_SESSION['err3']) ? "" :  $_SESSION['err3'] ?></span>

		<input type="password" class="field" id="password" name="password" value="<?php echo empty($_SESSION['password']) ? "" :  $_SESSION['password'] ?>" placeholder="Enter Your Password">
		<span><?php echo empty($_SESSION['err4']) ? "" :  $_SESSION['err4'] ?></span>

		<input type="password" class="field" id="confirm_password" name="confirm_password" value="<?php echo empty($_SESSION['confirm_password']) ? "" :  $_SESSION['confirm_password'] ?>" placeholder="Re-write Your Password">
		<span><?php echo empty($_SESSION['err5']) ? "" :  $_SESSION['err5'] ?></span>
		<select class="field" name="role" id="role" required>
    <option value="">Select Role</option>
    <option value="student" <?php echo (isset($_SESSION['role']) && $_SESSION['role'] === 'student') ? 'selected' : ''; ?>>Student</option>
    <option value="librarian" <?php echo (isset($_SESSION['role']) && $_SESSION['role'] === 'librarian') ? 'selected' : ''; ?>>Librarian</option>
  </select>
<span><?php echo empty($_SESSION['err8']) ? "" : $_SESSION['err8']; ?></span> <br>
		<span> Gender: </span>
        <label>
        <input type="radio" name="gender" value="male" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] === 'male') ? 'checked' : ''; ?>>
        Male
        </label>
        <label>
        <input type="radio" name="gender" value="female" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] === 'female') ? 'checked' : ''; ?>>
        Female
        </label>
        <label>
        <input type="radio" name="gender" value="other" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] === 'other') ? 'checked' : ''; ?>>
        Other
        </label><br>
        <span><?php echo empty($_SESSION['err6']) ? "" : $_SESSION['err6']; ?></span>
		<br><br>


		<input type="submit" id="submit" value="Registration">
	</form>

	<?php echo empty($_SESSION['err7']) ? "" :  $_SESSION['err7'] ?>

</div>

</body>
</html>
