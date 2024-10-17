<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
    <fieldset>
        <legend>Login</legend>
        <form action="loginAction.php" method="post" novalidate>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php echo isset($_SESSION['uname']) ? $_SESSION['uname'] : ""; ?>" autocomplete="off">
            <?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : ""; ?>
            <br><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : ""; ?>
            <br><br>
            <input type="submit" value="Login">
        </form>
        <?php
        if (isset($_SESSION['msg3'])) {
            echo $_SESSION['msg3'];
            unset($_SESSION['msg3']);
        }
        ?>
    </fieldset>
</body>
</html>
