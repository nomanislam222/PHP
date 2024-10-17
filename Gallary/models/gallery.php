<?php

function saveImage($userId, $image, $imageName) {
    $conn = mysqli_connect("localhost", "root", "", "my_app");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $encodedImage = base64_encode($image);
    $sql = "INSERT INTO gallery (user_id, image, image_name) VALUES ('$userId', '$encodedImage', '$imageName')";
    return mysqli_query($conn, $sql);
}

function getUserImages($userId) {
    $conn = mysqli_connect("localhost", "root", "", "my_app");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id, image, image_name FROM gallery WHERE user_id = '$userId'";
    $result = mysqli_query($conn, $sql);

    $images = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $images[] = [
            'id' => $row['id'],
            'image' => base64_decode($row['image']),
            'image_name' => $row['image_name']
        ];
    }

    return $images;
}

function deleteImage($imageId) {
    $conn = mysqli_connect("localhost", "root", "", "my_app");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM gallery WHERE id = '$imageId'";
    return mysqli_query($conn, $sql);
}
