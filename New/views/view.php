<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$conn = mysqli_connect("localhost", "root", "", "my_app");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT image_name, image_path FROM gallery WHERE user_id = '$userId'";
$result = mysqli_query($conn, $sql);

$images = [];
while ($row = mysqli_fetch_assoc($result)) {
    $images[] = $row;
}

mysqli_close($conn);

if (isset($_SESSION['upload_error']) && !empty($_SESSION['upload_error'])) {
    echo "<p style='color:red;'>" . $_SESSION['upload_error'] . "</p>";
    unset($_SESSION['upload_error']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
    <style>
        a {
            text-decoration: none; 
            color: blue; 
            padding: 10px 20px; 
            border: 2px solid blue; 
            display: inline-block;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery-item {
            width: 30%;
            box-sizing: border-box;
            text-align: center;
        }
        .gallery-item img {
            max-width: 100%;
            height: auto;
            border: 1px solid gray;
            border-radius: 4px;
        }
        .gallery-item p {
            margin-top: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <a href="../controllers/Logout.php">Logout</a>
    <a href="../views/index.php">Upload Image</a>

    <div class="container">
        <h1>Image Gallery</h1>
        <div class="gallery">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $image): ?>
                    <div class="gallery-item">
                        <img src="<?php echo htmlspecialchars($image['image_path']); ?>">
                        <p><?php echo htmlspecialchars($image['image_name']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No images found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
