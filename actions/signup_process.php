<?php
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["fname"])) {
    die("First Name is required");
}

if (empty($_POST["lname"])) {
    die("Last Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"]) || ! preg_match("/[0-9]/", $_POST["password"]) ) {
    die("Password must contain at least one letter or Password must contain at least one number ");
}


if ($_POST["password"] !== $_POST["cpassword"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

//$mysqli = require  "C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php";

$sql = "INSERT INTO users (fname, lname, email, username, password_hash, roles)
        VALUES (?, ?, ?, ?, ?, ?)";
        
$stmt = $conn->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $conn->error);
}


$stmt->bind_param("ssssss", $_POST["fname"], $_POST["lname"], $_POST["email"], $_POST["username"], $password_hash, $_POST["roles"]);

                  
if ($stmt->execute()) {

    header("Location: signup_success.php");
    exit;
    
} else {
    
    if ($conn->errno === 1062) {
        die("email already taken");
    } else {
        die($conn->error . " " . $conn->errno);
    }
}

}
?>