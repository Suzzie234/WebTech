<?php
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");

if ($_GET['action'] == 'fetch') {
    $result = $conn->query("SELECT * FROM levels");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}

if ($_GET['action'] == 'add') {
    $name = $_POST['level-name'];
    $clue = $_POST['emoji-clue'];
    $answer = $_POST['correct-answer'];
    $stmt = $conn->prepare("INSERT INTO levels (name, clue, answer) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $clue, $answer);
    $stmt->execute();
}

if ($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $conn->query("DELETE FROM levels WHERE id = $id");
}
?>
