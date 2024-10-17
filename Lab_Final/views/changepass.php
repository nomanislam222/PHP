<?php
require "../controllers/passwordcontroller.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
    <script type="text/javascript" src="../views/js/change_password.js"></script>
</head>
<body>
    <header>
 <?php include '../views/header.php'; ?>
</header>

<section>
 <?php include '../views/nav.php'; ?>
  
  <article>
    <div class="container">
        <h2>Change Password</h2>

        <?php if (!empty($_SESSION['msg'])): ?>
            <p class="success"><?php echo $_SESSION['msg']; ?></p>
            <?php unset($_SESSION['msg']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['err'])): ?>
            <p class="error"><?php echo $_SESSION['err']; ?></p>
            <?php unset($_SESSION['err']); ?>
        <?php endif; ?>

        <form method="post" action="" onsubmit="return validatePasswordForm(this)" novalidate>
            <label>Current Password:</label>
            <input class="view" type="password" name="current_password" required>
            <span id="err_current_password"></span>
            <br> <br>

            <label>New Password:</label>
            <input class="view" type="password" name="new_password" required>
            <span id="err_new_password"></span>
            <br> <br>

            <label>Confirm New Password:</label>
            <input class="view" type="password" name="confirm_password" required>
            <span id="err_confirm_password"></span>
            <br> <br>

            <input id="submit" type="submit" value="Change Password">
        </form>
    </div>
</article>
</section>
</body>
</html>
