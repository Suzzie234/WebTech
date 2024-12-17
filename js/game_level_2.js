// Timer functionality
let timeLeft = 60; // Starting time for the level (60 seconds)
const timerElement = document.getElementById('timer');
let timerInterval;

function startTimer() {
    timerInterval = setInterval(() => {
        timeLeft--;
        timerElement.textContent = timeLeft; // Update the timer display

        // When time runs out
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            alert("Time's up! You failed to escape.");
            // Optionally, redirect or reset game here
            location.reload(); // Reload the page or redirect to a failure screen
        }
    }, 1000); // Update every second
}

// Start the timer when the page loads
startTimer();

// Submit answer functionality
document.getElementById('submit-answer').addEventListener('click', () => {
    const userAnswer = document.getElementById('answer').value.trim().toLowerCase(); // Get the user's answer and normalize to lowercase
    
    if (userAnswer === "light lock") {  // The correct answer for level 2
        clearInterval(timerInterval); // Stop the timer if the answer is correct
        alert("Congratulations! You've escaped Level 2!");
        // Optionally, redirect to the next level page
        window.location.href = "game_level_3.php"; // Redirect to Level 3 (or next page)
    } else {
        alert("Incorrect answer. Try again!"); // Alert for incorrect answer
    }
});

// Hint functionality
document.getElementById('get-hint').addEventListener('click', () => {
    const hintText = document.getElementById('hint-text');
    
    // Reveal hint text when "Hint" button is clicked
    hintText.classList.remove('hidden'); 

    // Optional: Deduct points or add some game logic for using a hint
});
