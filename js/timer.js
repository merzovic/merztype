let timer;
let timeLeft = 15;

function startTimer() {
    timer = setInterval(() => {
        timeLeft--;
        document.getElementById('timer').textContent = `time left: ${timeLeft}s`;
        if (timeLeft <= 0) {
            clearInterval(timer);
            endGame();
        }
    }, 1000);
}

function resetTimer() {
    clearInterval(timer);
    timeLeft = parseInt(document.getElementById('timeSelect').value);
    document.getElementById('timer').textContent = `time left: ${timeLeft}s`;
}
