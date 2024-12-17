// Timer functionality
let timeLeft = 60;
const timerElement = document.getElementById('timer');
let timerInterval;

function startTimer() {
    timerInterval = setInterval(() => {
        timeLeft--;
        timerElement.textContent = timeLeft;

        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            alert("Time's up! You failed to escape.");
            location.reload(); // Reload or redirect to a failure screen
        }
    }, 1000);
}

startTimer();

// Submit answer functionality
document.getElementById('submit-answer').addEventListener('click', () => {
    const userAnswer = document.getElementById('answer').value.trim().toLowerCase();
    
    if (userAnswer === "explosion joystick") {  // The correct answer for level 4
        clearInterval(timerInterval);
        alert("Congratulations! You've escaped Level 4!");
        window.location.href = "game_level_5.php"; // Redirect to Final Level (Level 5)
    } else {
        alert("Incorrect answer. Try again!");
    }
});

// Hint functionality
document.getElementById('get-hint').addEventListener('click', () => {
    document.getElementById('hint-text').classList.remove('hidden');
});
