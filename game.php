<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emoji Escape Room</title>
    <link rel="stylesheet" href="css/game.css">

    <link href="https://fonts.cdnfonts.com/css/arcade-classic" rel="stylesheet">

    <!-- Adding a favicon-->
         <link rel ="icon" type= "image/png" href="https://cdn-icons-png.flaticon.com/128/3483/3483089.png">
</head>
<body>
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

    <script src="game.js"></script>
</body>
</html>
