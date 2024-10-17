<?php
session_start();
require "../models/User.php";

$conn = mysqli_connect("localhost", "root", "", "my_app");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['book_id'];
    $requester_id = $_POST['requester_id'];
    
    $sql = "INSERT INTO borrow_requests (book_id, requester_id, request_date) VALUES ('$book_id', '$requester_id', NOW())";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Borrow request submitted successfully!";
        header("Location: ../views/borrow_request.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
