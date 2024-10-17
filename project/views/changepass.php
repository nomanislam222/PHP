<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="../js/validation.js"></script>
    <script type="text/javascript">
        // Add event listener for old password verification
        window.onload = function() {
            const oldPasswordField = document.getElementById("old_password");
            oldPasswordField.addEventListener("blur", verifyOldPassword); // Verify on losing focus
        };
    </script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="../controllers/Logout.php">Logout</a></li>
        </ul>
    </nav>
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

        <form method="post" action="../controllers/PasswordController.php" onsubmit="return isPasswordChangeValid(this)">
            <label>Old Password:</label>
            <input type="password" name="old_password" id="old_password">
            <div id="oldPasswordErr" class="error"></div>
            <br><br>

            <label>New Password:</label>
            <input type="password" name="new_password">
            <div id="err2" class="error"></div>
            <br><br>

            <label>Confirm New Password:</label>
            <input type="password" name="confirm_password">
            <div id="err3" class="error"></div>
            <br><br>

            <button type="submit">Change Password</button>
        </form>
    </div>
</body>
</html>
