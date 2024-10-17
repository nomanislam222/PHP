<?php
require_once 'UserModel.php';

class RegistrationController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new UserModel($conn);
    }

    public function registrationAction() {
        session_start();
        $_SESSION['usernameErr'] = "";
        $_SESSION['passwordErr'] = "";
        $_SESSION['msg'] = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->sanitize($_POST['email']);
            $password = $this->sanitize($_POST['password']);
            $usernameErr = "";
            $passwordErr = "";
            $flag = true;

            if (empty($username)) {
                $flag = false;
                $_SESSION['usernameErr'] = "Please provide the username";
            } elseif ($this->userModel->credentialMatch($username)) {
                $flag = false;
                $_SESSION['usernameErr'] = "Email already exists. Please provide another email";
            }

            if (empty($password)) {
                $flag = false;
                $_SESSION['passwordErr'] = "Please provide the password";
            } elseif (!$this->isValidPassword($password)) {
                $flag = false;
                $_SESSION['passwordErr'] = "Password must be at least 6 characters long, with at least 1 uppercase letter, 1 lowercase letter, 1 digit, and 1 special character";
            }

            if ($flag === true) {
                if ($this->userModel->addUser($username, $password)) {
                    $_SESSION['msg'] = "User registered successfully!";
                } else {
                    $_SESSION['msg'] = "Registration failed!";
                }
            }

            header("Location: registration.php");
        } else {
            $_SESSION['msg'] = "Unauthorized Access";
            header("Location: registration.php");
        }
        exit;
    }

    private function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    //I take it from google search
    private function isValidPassword($password) {
        return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/', $password);
    }
}
?>
