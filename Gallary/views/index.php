<?php
session_start();
require "../models/Gallery.php";
$userId = $_SESSION['user_id'];
$images = getUserImages($userId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Personal Gallery</title>
</head>
<body>
    <h1>Welcome to Your Personal Gallery</h1>

    <form action="../controllers/GalleryController.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit">Upload Image</button>
    </form>

    <h2>Your Images</h2>
    <?php foreach ($images as $image): ?>
        <div>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($image['image']); ?>" alt="<?php echo $image['image_name']; ?>" width="200">
            <p><?php echo $image['image_name']; ?></p>
            <a href="../controllers/GalleryController.php?delete=<?php echo $image['id']; ?>">Delete</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
