<?php
session_start();
require "../models/Gallery.php";

$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image'])) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $imageName = $_FILES['image']['name'];

        if (saveImage($userId, $image, $imageName)) {
            header("Location: ../views/index.php");
        }
    }
}

if (isset($_GET['delete'])) {
    $imageId = $_GET['delete'];
    if (deleteImage($imageId)) {
        header("Location: ../views/index.php");
    }
}
?>
