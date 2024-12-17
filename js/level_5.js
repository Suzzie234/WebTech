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

    if (userAnswer === "trophy celebration") {  // The correct answer for the final level
        clearInterval(timerInterval);
        alert("Congratulations! You've completed all the levels!");
        // Final success logic, such as displaying a message or resetting the game
    } else {
        alert("Incorrect answer. Try again!");
    }
});

// Hint functionality
document.getElementById('get-hint').addEventListener('click', () => {
    document.getElementById('hint-text').classList.remove('hidden');
});
