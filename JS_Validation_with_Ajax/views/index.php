<?php 
session_start(); 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$error = isset($_SESSION['upload_error']) ? $_SESSION['upload_error'] : '';
unset($_SESSION['upload_error']);  
?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
</head>
<body>
      <nav>
        <ul>
            <li><a href="../views/profile.php">Profile</a></li>
            <li><a href="../views/view.php">Gallery</a></li>
            <li><a href="../controllers/Logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <form action="../controllers/galleryController.php" method="post" enctype="multipart/form-data" novalidate>
            <label for="fileUpload">Select image to upload</label>
            <input type="file" class="field" name="fileToUpload" id="fileToUpload">
            <input type="text" class="field" name="imageName" placeholder="Enter image name">
            <input type="submit" value="Upload Image" id="submit" name="submit">
        </form>

        <?php if (!empty($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
