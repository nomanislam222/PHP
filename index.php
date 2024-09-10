<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageName = htmlspecialchars($_POST['imageName']);
    $uploadOk = 1;

    // Check if file is an image
    if (in_array($imageFileType, ['jpg', 'jpeg', 'png']) && getimagesize($_FILES["fileToUpload"]["tmp_name"]) !== false) {
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Attempt to move uploaded file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $_SESSION['uploaded_image'] = $target_file;
            $_SESSION['image_name'] = $imageName;
            header("Location: view.php");
            exit();
        } else {
            $error = "Error uploading file.";
        }
    } else {
        $error = "Invalid file type. Only JPG and PNG images are allowed.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <form action="index.php" method="post" enctype="multipart/form-data" novalidate>
            <label for="fileUpload">Select image to upload</label>
            <input type="file" class="field" name="fileToUpload" id="fileToUpload">
            <input type="text" class="field" name="imageName" placeholder="Enter image name">
            <input type="submit" value="Upload Image" id="submit" name="submit">
        </form>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
