<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="../controllers/RegistrationController.php" method="post" novalidate>
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

        <button type="submit">Register</button>
    </form>
   <?php echo empty($_SESSION['err4']) ? "" :  $_SESSION['err4'] ?>
</body>
</html>
