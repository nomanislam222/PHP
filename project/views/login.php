<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="../js/validation.js"></script>
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <?php if (!empty($_SESSION['err'])): ?>
            <p class="error"><?php echo $_SESSION['err']; ?></p>
            <?php unset($_SESSION['err']); ?>
        <?php endif; ?>

        <form method="post" action="../controllers/LoginController.php" onsubmit="return isLoginValid(this)">
            <label>Email:</label>
            <input type="email" name="email">
            <div id="err1" class="error"></div>

            <label>Password:</label>
            <input type="password" name="password">
            <div id="err2" class="error"></div>

            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</body>
</html>
