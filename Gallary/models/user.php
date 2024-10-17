<?php

function matchCredentials($email, $password) {
    $conn = mysqli_connect("localhost", "root", "", "my_app");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $password = md5($password);
    $sql = "SELECT id FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    return (mysqli_num_rows($result) === 1);
}

function registerUser($email, $password) {
    $conn = mysqli_connect("localhost", "root", "", "my_app");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return false; // User already exists
    }

    $password = md5($password);
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    return mysqli_query($conn, $sql);
}
