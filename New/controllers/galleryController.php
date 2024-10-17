<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php");
    exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $target_dir = "../uploads/";  
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageName = htmlspecialchars($_POST['imageName']);
    $uploadOk = 1;

    if (in_array($imageFileType, ['jpg', 'jpeg', 'png']) && getimagesize($_FILES["fileToUpload"]["tmp_name"]) !== false) {
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);  
        }

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $userId = $_SESSION['user_id'];
            $conn = mysqli_connect("localhost", "root", "", "my_app");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO gallery (user_id, image_name, image_path) VALUES ('$userId', '$imageName', '$target_file')";

            if (mysqli_query($conn, $sql)) {
                header("Location: ../views/view.php");
                exit();
            } else {
                $error = "Error saving image data to the database.";
            }

            mysqli_close($conn);
        } else {
            $error = "Error uploading file.";
        }
    } else {
        $error = "Invalid file type. Only JPG and PNG images are allowed.";
    }
    $_SESSION['upload_error'] = $error;
    header("Location: ../views/index.php");
    exit();
}
?>
