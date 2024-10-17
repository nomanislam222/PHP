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
    <style type="text/css">
        a {
            text-decoration: none; 
            color: blue; 
            padding: 10px 20px; 
            border: 2px solid blue; 
            display: inline-block;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <a href="../controllers/Logout.php">Logout</a>
    <a href="../views/view.php">Gallery</a>
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
