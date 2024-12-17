<?php
session_start();
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch user data
$user_id = intval($_SESSION['user_id']);
$user_query = $conn->query("SELECT username, email, score, current_level FROM users WHERE id = $user_id");
$user = $user_query->fetch_assoc();

if (!$user) {
    echo "Error: User not found!";
    exit;
}

// Handle profile updates
$feedback = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_profile'])) {
        $new_username = $conn->real_escape_string(trim($_POST['username']));
        $new_email = $conn->real_escape_string(trim($_POST['email']));

        // Update username and email
        $update_query = $conn->query("UPDATE users SET username = '$new_username', email = '$new_email' WHERE id = $user_id");
        if ($update_query) {
            $_SESSION['username'] = $new_username; // Update session data
            $feedback = "Profile updated successfully!";
        } else {
            $feedback = "Error updating profile: " . $conn->error;
        }
    }

    if (isset($_POST['change_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Verify current password
        $password_query = $conn->query("SELECT password_hash FROM users WHERE id = $user_id");
        $password_data = $password_query->fetch_assoc();
        if (password_verify($current_password, $password_data['password_hash'])) {
            // Check new password match
            if ($new_password === $confirm_password) {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $conn->query("UPDATE users SET password_hash = '$password_hash' WHERE id = $user_id");
                $feedback = "Password updated successfully!";
            } else {
                $feedback = "Passwords do not match!";
            }
        } else {
            $feedback = "Current password is incorrect!";
        }
    }
}
?>