<?php
class User {

    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "my_app");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function register($full_name, $email, $password, $contact, $gender) {
        $password = password_hash($password, PASSWORD_BCRYPT); // Hash password
        $sql = "INSERT INTO users (full_name, email, password, contact, gender) VALUES ('$full_name', '$email', '$password', '$contact', '$gender')";
        return mysqli_query($this->conn, $sql);
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getUserById($user_id) {
        $sql = "SELECT * FROM users WHERE id = '$user_id'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function updateProfile($user_id, $full_name, $contact, $gender) {
        $sql = "UPDATE users SET full_name = '$full_name', contact = '$contact', gender = '$gender' WHERE id = '$user_id'";
        return mysqli_query($this->conn, $sql);
    }

    public function changePassword($user_id, $new_password) {
        $new_password = password_hash($new_password, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET password = '$new_password' WHERE id = '$user_id'";
        return mysqli_query($this->conn, $sql);
    }

    public function verifyOldPassword($user_id, $old_password) {
        $sql = "SELECT password FROM users WHERE id = '$user_id'";
        $result = mysqli_query($this->conn, $sql);
        $user = mysqli_fetch_assoc($result);
        return password_verify($old_password, $user['password']);
    }

    // **New Method**: Check if email exists
    public function checkEmailExists($email) {
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result) > 0;
    }
}
