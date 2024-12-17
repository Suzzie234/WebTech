// Variables for game state
/*let timeLeft = 60;
let timerInterval;
const correctAnswer = "key puzzle";

// Timer functionality
function startTimer() {
    const timerElement = document.getElementById("timer");
    timerInterval = setInterval(() => {
        timeLeft--;
        timerElement.textContent = timeLeft;

        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            alert("Time's up! You failed to escape.");
            resetGame();
        }
    }, 1000);
}

// Submit answer functionality
document.getElementById("submit-answer").addEventListener("click", () => {
    const userAnswer = document.getElementById("answer").value.toLowerCase();

    if (userAnswer === correctAnswer) {
        clearInterval(timerInterval);
        alert("Congratulations! You've escaped!");
    } else {
        alert("Wrong answer! Try again.");
    }
});

// Hint button functionality
document.getElementById("get-hint").addEventListener("click", () => {
    const hintText = document.getElementById("hint-text");
    hintText.classList.remove("hidden");
});

// Reset game functionality
function resetGame() {
    timeLeft = 60;
    document.getElementById("answer").value = "";
    document.getElementById("hint-text").classList.add("hidden");
    startTimer();
}

// Start the game
startTimer();

// JavaScript Function
document.getElementById("myButton").onclick = function() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "game_process.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Handle the response from PHP
        }
    };
    xhr.send("param=value"); // Send data to PHP
};*/

document.addEventListener("DOMContentLoaded", function () {
    const answerInput = document.getElementById("answer");
    const submitButton = document.getElementById("submit-answer");
    const hintButton = document.getElementById("get-hint");
    const hintText = document.getElementById("hint-text");
    const timerElement = document.getElementById("timer");

    let timer = 60;

    // Countdown timer
    /*const countdown = setInterval(() => {
        timer--;
        timerElement.textContent = timer;
        if (timer <= 0) {
            clearInterval(countdown);
            alert("Time's up! Reload the page to try again.");
        }
    }, 1000);

    // Submit answer
    submitButton.addEventListener("click", function (e) {
        e.preventDefault();
        const answer = answerInput.value.trim();
        if (!answer) {
            alert("Please enter an answer.");
            return;
        }

        fetch("actions/game_process.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `answer=${encodeURIComponent(answer)}`
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "success") {
                    alert(data.message);
                    location.reload(); // Reload to display the next level
                } else {
                    alert(data.message);
                }
            });
    });*/

    document.addEventListener("DOMContentLoaded", function () {
        const timerElement = document.getElementById("timer");
        let timeLeft = 60; // Timer starts at 60 seconds
    
        // Update the timer every second
        const countdown = setInterval(() => {
            timeLeft--;
    
            // Update the displayed time
            timerElement.textContent = timeLeft;
    
            // Check if time has run out
            if (timeLeft <= 0) {
                clearInterval(countdown); // Stop the timer
                alert("Time's up! Try again.");
                // Redirect the user to another page or reload the game
                window.location.href = "game_level_1.php";
            }
        }, 1000);
    });
    

    // Get a hint
    hintButton.addEventListener("click", function (e) {
        e.preventDefault();

        fetch("actions/game_process.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "get_hint=true"
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "hint") {
                    hintText.textContent = data.hint;
                    hintText.classList.remove("hidden");
                }
            });
    });
});

