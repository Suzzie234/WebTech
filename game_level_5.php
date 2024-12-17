<?php
// Including database connection and game logic
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");

// Assuming session is used to track users' progress
/*session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Set current level to 5 for this page (Final Level)
$current_level = 5;*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emoji Escape Room - Final Level</title>
    <link rel="stylesheet" href="assets/css/game.css">

    <link href="https://fonts.cdnfonts.com/css/arcade-classic" rel="stylesheet">

    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/128/3483/3483089.png">
</head>
<body>
    <div class="game-container">
        <header>
            <h1>Emoji Escape Room</h1>
            <p>Decode the emoji puzzle to escape!</p>
        </header>

        <section class="game-content">
            <!-- Final Level Information -->
            <div class="emoji-puzzle">
                <h2 id="level-title">Level 5 - Final Level</h2>
                <p id="emoji-clue">🏆🎉</p> <!-- Emoji clue for final level -->
            </div>
            <div class="user-input">
                <input type="text" id="answer" placeholder="Type your answer..." />
                <button id="submit-answer">Submit</button>
            </div>
        </section>

        <footer class="game-footer">
            <div class="timer">⏱️ Time Left: <span id="timer">60</span>s</div>
            <button id="get-hint">Hint</button>
            <p id="hint-text" class="hidden">Think about winning and celebrating!</p>
        </footer>
    </div>

    <!--Skip level-->
    <p><a href="game_level_5.php">Skip Level</a></p>

    <!--Leaderboard-->
    <p><a href="leaderboard.php">Check out the Leaderboard</a></p>

    <!--Profile-->
    <p><a href="profile.php">Profile</a></p>

    <!--Log out the user-->
    <p><a href="logout.php">Log out</a></p>

    <script src="level_5.js"></script>
</body>
</html>
