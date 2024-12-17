<?php
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");

// Fetch top scores
$query = $conn->query("SELECT username, score FROM users ORDER BY score DESC LIMIT 10");
$leaderboard = $query->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="assets/css/leaderboard.css">
     <!-- Adding a favicon-->
     <link rel ="icon" type= "image/png" href="https://cdn-icons-png.flaticon.com/128/3483/3483089.png">
</head>
<body>
    <div class="leaderboard-container">
        <h1>Leaderboard</h1>
        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Username</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leaderboard as $index => $entry): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($entry['username']) ?></td>
                        <td><?= htmlspecialchars($entry['score']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="profile.php" class="btn">Back to Profile</a>
    </div>
</body>
</html>
