<?php
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");
 
session_start();

// Get the user's current level
$id = $_SESSION['user_id'];
$user_query = $conn->query("SELECT current_level FROM users WHERE id = $id");
$user = $user_query->fetch_assoc();
$current_level = $user['current_level'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer = strtolower(trim($_POST['correct_answer']));

    // Check the answer for the current level
    $level_query = $conn->query("SELECT correct_answer FROM levels WHERE id = $current_level");
    $level = $level_query->fetch_assoc();

    if ($level && $answer === strtolower($level['correct_answer'])) {
        // Correct answer: Update user's level and score
        $conn->query("UPDATE users SET current_level = current_level + 1, score = score + 10 WHERE id = $user_id");
        $response = ['status' => 'success', 'message' => 'Correct answer! Proceed to the next level.'];

    exit;
    } else {
        // Incorrect answer
        $response = ['status' => 'error', 'message' => 'Incorrect answer. Try again!'];
    }
}

// Provide a hint if requested
if (isset($_POST['get_hint'])) {
    $hint_query = $conn->query("SELECT hint_text FROM hints WHERE level_id = $current_level");
    $hint = $hint_query->fetch_assoc();
    if ($hint) {
        $response = ['status' => 'hint', 'hint' => $hint['hint_text']];
    } else {
        $response = ['status' => 'hint', 'hint' => 'No hint available for this level.'];
    }
}

//echo json_encode($response);


?>





