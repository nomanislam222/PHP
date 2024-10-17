<?php 
session_start();
require "../models/User.php";

$user_id = $_SESSION['user_id'];
$user = getUserById($user_id);
$email = $user['email'];
$full_name = $user['full_name'];
$contact = $user['contact'];
$gender = $user['gender'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $contact = $_POST['contact'];

   if (!empty($full_name) && !empty($contact)) {
        $isUpdated = updateUser($user_id, $full_name, $contact);
        if ($isUpdated) {
            $_SESSION['msg'] = "Profile updated successfully!";
        } else {
            $_SESSION['err'] = "Failed to update profile.";
        }
    } else {
        $_SESSION['err'] = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
    <script type="text/javascript" src="../views/js/profile.js"></script>
</head>
<body>

	<nav>
    <ul>
	  <li><a href="../views/view.php">Gallery</a></li>
      <li><a href="../views/index.php">Upload Image</a></li>
	  <li><a href="../controllers/Logout.php">Logout</a></li>
    </ul>
  </nav>
    <div class="container">
        <h2>Your Profile</h2>
        
        <?php if (!empty($_SESSION['msg'])): ?>
            <p class="success"><?php echo $_SESSION['msg']; ?></p>
            <?php unset($_SESSION['msg']); ?>
        <?php endif; ?>
        
        <?php if (!empty($_SESSION['err'])): ?>
            <p class="error"><?php echo $_SESSION['err']; ?></p>
            <?php unset($_SESSION['err']); ?>
        <?php endif; ?>

        <form method="post" action="" onsubmit="return isValid(this)" novalidate>
            <label >Email:</label>
            <input class="view" type="email" name="email" value="<?php echo $email; ?>" readonly>
            <br> <br>
			
			<label>Gender:</label>
            <input class="view" type="text" name="gender" value="<?php echo ucfirst($gender); ?>" readonly>
            <br> <br>

            <label>Full Name:</label>
            <input class="view" type="text" name="full_name" value="<?php echo $full_name; ?>">
            <br> <br>

            <label>Contact:</label>
            <input class="view" type="text" name="contact" value="<?php echo $contact; ?>">
            <br> <br>
			<a href="../views/changepass.php"> Change Password </a>

            <input id="submit" type="submit" value="Update">
        </form>
    </div>
</body>
</html>
