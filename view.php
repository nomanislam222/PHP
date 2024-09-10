<?php
session_start();

if (!isset($_SESSION['uploaded_image']) || !isset($_SESSION['image_name'])) {
    header("Location: index.php");
    exit();
}

$imagePath = $_SESSION['uploaded_image'];
$imageName = $_SESSION['image_name'];

unset($_SESSION['uploaded_image']);
unset($_SESSION['image_name']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image View</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="preview">
            <img src="<?php echo htmlspecialchars($imagePath); ?>" >
            <p><?php echo htmlspecialchars($imageName); ?></p>
        </div>
        <a href="index.php">Upload another image</a>
    </div>
</body>
</html>
