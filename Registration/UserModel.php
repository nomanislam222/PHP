<?php
class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function credentialMatch($email) {
        $query = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_num_rows($result) > 0;
    }

    public function addUser($username, $password) {
        $query = "INSERT INTO users (email, password) VALUES ('$username', '$password')";
        return mysqli_query($this->conn, $query);
    }
}


?>
