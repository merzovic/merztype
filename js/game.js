let correctChars = 0;
let totalChars = 0;
let incorrectChars = 0;

const paragraph = "a than in both of year call should she write home for call should real then write look house part person few it house real be school no house here come tell before never so each could merz follow line other need back part it real could then why";
const words = paragraph.split(' ').sort(() => Math.random() - 0.5);
const paragraphDiv = document.getElementById('paragraph');
const input = document.getElementById('input');

paragraphDiv.innerHTML = words.map(word => `<span>${word}</span>`).join(' ');

input.addEventListener('input', (event) => {
    if (!timer) {
        startTimer();
    }
    if (event.inputType === 'deleteContentBackward') {
        totalChars--;
    } else {
        totalChars++;
    }
    updateParagraph();
});

function updateParagraph() {
    const typedText = input.value.trim();
    const wordSpans = paragraphDiv.querySelectorAll('span');
    const typedWords = typedText.split(' ');

    correctChars = 0;
    incorrectChars = 0;
    wordSpans.forEach((span, index) => {
        if (span.textContent === typedWords[index]) {
            span.classList.add('correct');
            correctChars += span.textContent.length;
        } else {
            span.classList.remove('correct');
            if (typedWords[index] !== undefined) {
                incorrectChars += typedWords[index].length;
            }
        }
    });
}

function endGame() {
    input.disabled = true;
    const wpm = (correctChars / 5) / (parseInt(document.getElementById('timeSelect').value) / 60);
    const accuracy = (correctChars / (correctChars + incorrectChars)) * 100;
    
    // Display results in the modal
    document.getElementById('modalWpm').textContent = `Your WPM: ${wpm.toFixed(2)}`;
    document.getElementById('modalAccuracy').textContent = `Accuracy: ${accuracy.toFixed(2)}%`;
    
    const modal = document.getElementById('resultModal');
    const span = document.getElementsByClassName('close')[0];
    
    modal.style.display = 'block';
    
    span.onclick = function() {
        modal.style.display = 'none';
    }
    
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
}
