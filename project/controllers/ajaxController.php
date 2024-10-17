<?php
require_once '../models/User.php';

session_start();

header('Content-Type: application/json'); // Set header for JSON response

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['action'])) {
        echo json_encode(['status' => 'error', 'msg' => 'No action specified.']);
        exit;
    }

    $action = $_POST['action'];
    $user = new User();

    switch ($action) {
        case 'checkEmail':
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
                $exists = $user->checkEmailExists($email);
                if ($exists) {
                    echo json_encode(['status' => 'exists', 'msg' => 'Email already exists.']);
                } else {
                    echo json_encode(['status' => 'available', 'msg' => 'Email is available.']);
                }
            } else {
                echo json_encode(['status' => 'error', 'msg' => 'Email not provided.']);
            }
            break;

        case 'verifyOldPassword':
            if (isset($_POST['old_password'])) {
                if (!isset($_SESSION['user_id'])) {
                    echo json_encode(['status' => 'error', 'msg' => 'User not logged in.']);
                    exit;
                }
                $user_id = $_SESSION['user_id'];
                $old_password = $_POST['old_password'];
                $isValid = $user->verifyOldPassword($user_id, $old_password);
                if ($isValid) {
                    echo json_encode(['status' => 'valid', 'msg' => 'Old password is correct.']);
                } else {
                    echo json_encode(['status' => 'invalid', 'msg' => 'Old password is incorrect.']);
                }
            } else {
                echo json_encode(['status' => 'error', 'msg' => 'Old password not provided.']);
            }
            break;

        case 'updateProfile':
            if (!isset($_SESSION['user_id'])) {
                echo json_encode(['status' => 'error', 'msg' => 'User not logged in.']);
                exit;
            }
            $user_id = $_SESSION['user_id'];
            $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
            $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
            $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

            if (empty($full_name) || empty($contact) || empty($gender)) {
                echo json_encode(['status' => 'error', 'msg' => 'All fields are required.']);
                exit;
            }

            $updated = $user->updateProfile($user_id, $full_name, $contact, $gender);
            if ($updated) {
                echo json_encode(['status' => 'success', 'msg' => 'Profile updated successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'msg' => 'Failed to update profile.']);
            }
            break;

        default:
            echo json_encode(['status' => 'error', 'msg' => 'Invalid action.']);
            break;
    }
} else {
    echo json_encode(['status' => 'error', 'msg' => 'Invalid request method.']);
}
?>
