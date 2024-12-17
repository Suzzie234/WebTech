<?php
session_start();
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");

// Fetch user data
$user_id = $_SESSION['user_id'];
$query = $conn->query("SELECT score FROM users WHERE id = $user_id");
$user = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Completed</title>
    <link rel="stylesheet" href="assets/css/completion.css">
     <!-- Adding a favicon-->
     <link rel ="icon" type= "image/png" href="https://cdn-icons-png.flaticon.com/128/3483/3483089.png">
</head>
<body>
    <div class="completion-container">
        <h1>Congratulations!</h1>
        <p>You have successfully completed the Emoji Escape Room!</p>
        <p><strong>Your Final Score:</strong> <?= htmlspecialchars($user['score']) ?></p>
        <a href="profile.php" class="btn">View Profile</a>
        <a href="logout.php" class="btn">Log Out</a>
    </div>
</body>
</html>
