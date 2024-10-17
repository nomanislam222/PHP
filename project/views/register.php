<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="../js/validation.js"></script>
    <script type="text/javascript">
        // Add event listener for email field
        window.onload = function() {
            const emailField = document.getElementById("email");
            emailField.addEventListener("blur", checkEmail); // Check email on losing focus
        };
    </script>
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        <?php if (!empty($_SESSION['err'])): ?>
            <p class="error"><?php echo $_SESSION['err']; ?></p>
            <?php unset($_SESSION['err']); ?>
        <?php endif; ?>

        <form method="post" action="../controllers/RegisterController.php" onsubmit="return isRegisterValid(this)">
            <label>Full Name:</label>
            <input type="text" name="full_name">
            <div id="err1" class="error"></div>

            <label>Email:</label>
            <input type="email" name="email" id="email" onblur="checkEmail()">
            <div id="emailErr" class="error"></div>

            <label>Password:</label>
            <input type="password" name="password">
            <div id="err3" class="error"></div>

            <label>Confirm Password:</label>
            <input type="password" name="confirm_password">
            <div id="err4" class="error"></div>

            <label>Contact Number:</label>
            <input type="text" name="contact">
            <div id="err5" class="error"></div>

            <label>Gender:</label>
            <select name="gender">
                <option value="">Select Gender</option> <!-- Added default option -->
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>
