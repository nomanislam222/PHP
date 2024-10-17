<?php
session_start();
require "../models/User.php";

$user_id = $_SESSION['user_id'];
$user = getUserById($user_id);
$cp_db = $user['password']; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cp = $_POST['current_password'];
    $np = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($cp === $cp_db) {
        if (!empty($np) && $np === $confirm_password) {
            $isUpdated = updatePassword($user_id, $np); 
            if ($isUpdated) {
                $_SESSION['msg'] = "Password changed successfully!";
            } else {
                $_SESSION['err'] = "Failed to change password.";
            }
        } else {
            $_SESSION['err'] = "New password and confirmed password do not match.";
        }
    } else {
        $_SESSION['err'] = "Current password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
    <script type="text/javascript" src="../views/js/change_password.js"></script>
    <script type="text/javascript" src="../views/js/ajax.js"></script>

</head>
<body>
    <nav>
        <ul>
            <li><a href="../views/profile.php">Profile</a></li>
            <li><a href="../views/view.php">Gallery</a></li>
            <li><a href="../views/index.php">Upload Image</a></li>
            <li><a href="../controllers/Logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <article>
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
            <input class="view" type="password" name="current_password" id="current_password" required onblur="checkCurrentPassword()">
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
        </article>
    </div>
</body>
</html>
