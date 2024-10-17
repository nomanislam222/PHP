<?php 
require "../controllers/profileController.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../views/styles.css">
    <script type="text/javascript" src="../views/js/profile.js"></script>
</head>
<body>
<header>
 <?php include '../views/header.php'; ?>
</header>

<section>
 <?php include '../views/nav.php'; ?>
  
  <article>
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
            <label>Email:</label>
            <input class="view" type="email" name="email" value="<?php echo $email; ?>" readonly>
            <br> <br>
            
            <label>Gender:</label>
            <input class="view" type="text" name="gender" value="<?php echo $gender; ?>" readonly>
            <br> <br>

            <label>Full Name:</label>
            <input class="view" type="text" name="full_name" value="<?php echo $full_name; ?>">
            <span id="err1" class="error"></span>
            <br> <br>

            <label>Contact:</label>
            <input class="view" type="text" name="contact" value="<?php echo $contact; ?>">
            <span id="err2" class="error"></span>
            <br> <br>

            <input id="submit" type="submit" value="Update">
        </form>
    </div>
  </article>
</section>



</body>
</html>

