<?php
require_once '../models/User.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user = new User();
$currentUser = $user->getUserById($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Profile</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="../js/validation.js"></script>
    <script type="text/javascript">
        // Add event listener for profile form submission
        window.onload = function() {
            const profileForm = document.getElementById("profileForm");
            profileForm.addEventListener("submit", updateProfile);
        };
    </script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="changepass.php">Change Password</a></li>
            <li><a href="../controllers/Logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>Your Profile</h2>

        <div id="message"></div>

        <form id="profileForm" method="post" onsubmit="return false;" novalidate>
            <label>Email:</label>
            <input class="view" type="email" name="email" value="<?php echo htmlspecialchars($currentUser['email']); ?>" readonly>
            <br><br>

            <label>Gender:</label>
            <input class="view" type="text" name="gender" value="<?php echo ucfirst(htmlspecialchars($currentUser['gender'])); ?>" readonly>
            <br><br>

            <label>Full Name:</label>
            <input class="view" type="text" name="full_name" value="<?php echo htmlspecialchars($currentUser['full_name']); ?>">
            <div id="err1" class="error"></div>
            <br><br>

            <label>Contact:</label>
            <input class="view" type="text" name="contact" value="<?php echo htmlspecialchars($currentUser['contact']); ?>">
            <div id="err2" class="error"></div>
            <br><br>

            <button type="submit">Update Profile</button>
        </form>

        <a href="changepass.php">Change Password</a>
    </div>
</body>
</html>
