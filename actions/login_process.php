<?php
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require "C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php";
    
    // Escape the email input
    $username = $mysqli->real_escape_string($_POST["username"]);
    
    // Prepare the SQL query
    $sql = sprintf("SELECT * FROM users WHERE username = '%s'", $username);
    
    // Execute the query
    $result = $mysqli->query($sql);
    
    // Fetch the user data
    $user = $result->fetch_assoc();
    
    // Debugging: Check if user is found
    if (!$user) {
        echo "No user found with that email.";
    } else {
        // Verify the password
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"]; // Ensure this key exists
            $_SESSION["roles"] = $user["roles"];

            // Redirect based on role
            if ($user["roles"] === "admin") {
                header("Location: http://localhost/Emoji%20Escape%20Room/admin/dashboard.php");
            } elseif ($user["roles"] === "regular") {
                header("Location: http://localhost/Emoji%20Escape%20Room/game_level_1.php");
            } else {
                // Default redirection for unknown roles
                header("Location: http://localhost/Emoji%20Escape%20Room/index.php");
            }
           // header("Location: http://localhost/Emoji%20Escape%20Room/game_level_1.php");
            exit;
        } else {
            echo "Invalid credentials!";
        }
    }

    // If the user is not found or password verification fails
    $is_invalid = true;

    if ($is_invalid) {
        echo "Invalid email or password";
    }
}



//print_r($_POST);

?>