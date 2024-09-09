const refreshButton = document.getElementById('refresh');
const timeSelect = document.getElementById('timeSelect');

refreshButton.addEventListener('click', resetGame);

timeSelect.addEventListener('change', function() {
    const selectedTime = this.value;
    window.location.href = window.location.pathname + '?time=' + selectedTime;
});

function resetGame() {
    resetTimer();
    correctChars = 0;
    incorrectChars = 0;
    totalChars = 0;
    input.disabled = false;
    input.value = '';
    document.getElementById('wpm').textContent = '';
    document.getElementById('accuracy').textContent = '';
    words.sort(() => Math.random() - 0.5);
    paragraphDiv.innerHTML = words.map(word => `<span>${word}</span>`).join(' ');
    input.focus();
    timer = null;
    
    // Hide the modal
    document.getElementById('resultModal').style.display = 'none';
}

document.addEventListener('keydown', (event) => {
    if (event.altKey && event.key === 'Tab') {
        event.preventDefault();
        resetGame();
    }
});

// Function to set the timer based on the URL parameter
function setTimerFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const time = urlParams.get('time');
    if (time) {
        document.getElementById('timeSelect').value = time;
        // Set your timer logic here based on the 'time' value
        // For example:
        resetTimer();
    }
}

// Call the function when the page loads
window.onload = setTimerFromURL;
