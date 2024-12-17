<?php
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");
/*include("C:/xampp/htdocs/Emoji Escape Room/actions/game_process.php");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");*/

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emoji Escape Room - Level 1</title>
    <link rel="stylesheet" href="assets/css/game.css">

    <link href="https://fonts.cdnfonts.com/css/arcade-classic" rel="stylesheet">

    <!-- Adding a favicon-->
         <link rel ="icon" type= "image/png" href="https://cdn-icons-png.flaticon.com/128/3483/3483089.png">
</head>
<body>
    <form method="POST" action="http://localhost/Emoji%20Escape%20Room/actions/game_process.php">
        <div class="game-container">
        <header>
            <h1>Emoji Escape Room</h1>
            
            <p>Decode the emoji puzzle to escape!</p>
        </header>

        <section class="game-content">
            <div class="emoji-puzzle">
                <h2 id="level-title">Level 1</h2>
                <p id="emoji-clue">🔑🧩</p>
            </div>
            <div class="user-input">
                <input type="text" id="answer" placeholder="Type your answer..." />
                <button id="submit-answer">Submit</button>
            </div>
        </section>

        <footer class="game-footer">
            <div class="timer">⏱️ Time Left: <span id="timer">60</span>s</div>
            <button id="get-hint">Hint</button>
            <p id="hint-text" class="hidden">Think about what these emojis could represent!</p>
        </footer>
    </div>
</form>

    <!--Skip level-->
    <p><a href="game_level_2.php">Skip Level</a></p>

    <!--Leaderboard-->
    <p><a href="leaderboard.php">Check out the Leaderboard</a></p>

    <!--Profile-->
    <p><a href="profile.php">Profile</a></p>

    <!--Log out the user-->
    <p><a href="logout.php">Log out</a></p>

    <script src="game.js"></script>
</body>
</html>
