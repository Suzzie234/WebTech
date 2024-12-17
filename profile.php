<?php
session_start();
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch user data
$user_id = intval($_SESSION['user_id']);
$query = $conn->query("SELECT username, email, score, current_level FROM users WHERE id = $user_id");
$user = $query->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>Escape Room</title>

        <link rel="stylesheet" href="assets/css/profile.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.cdnfonts.com/css/arcade-classic" rel="stylesheet">

        <!-- Adding a favicon-->
         <link rel ="icon" type= "image/png" href="https://cdn-icons-png.flaticon.com/128/3483/3483089.png">

         <!--bootstrap-->
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->

<body>
    <div class="profile-container">
        <h1>User Profile</h1>

        <!-- Display User Data -->
        <div class="user-info">
            <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Score:</strong> <?= htmlspecialchars($user['score']) ?></p>
            <p><strong>Current Level:</strong> <?= htmlspecialchars($user['current_level']) ?></p>
        </div>

        <!-- Update User Data Form -->
        <form id="update-profile-form" method="POST" action="actions/profile_process.php">
            <h2>Update Profile</h2>

            <label for="username">New Username:</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>

            <label for="email">New Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter new password">

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password">

            <button type="submit">Update Profile</button>
        </form>
    </div>

    <script src="assets/js/profile.js"></script>
</body>
</html>
