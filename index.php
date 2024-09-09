<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>merztype</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image" href="icon.png">
</head>
<body>
    <div id="header">
        <div id="title">merztype</div>
        <div id="version">ver alfa 0.2</div>
    </div>
    <div id="container">
        
        <div id="timer">time left: 15s</div>
        <div id="paragraph"></div>
        <input type="text" spellcheck="false" id="input" placeholder="start typing..." autofocus>
        <div id="wpm"></div>
        <div id="accuracy"></div>
        <div>
        <button id="refresh" class="button">↺</button>
        <select id="timeSelect" class="button">
            <option value="30">30 seconds</option>
            <option value="15">15 seconds</option>
            <option value="10">10 seconds</option>
            <option value="5">5 seconds</option>
        </select>
    </div>
    </div>
    <script src="js/timer.js"></script>
    <script src="js/game.js"></script>
    <script src="js/ui.js"></script>
    <script src="js/main.js"></script>
    <br>
    <br>
    <div id="foot">tab + enter to reset</div>

    
    <div id="resultModal" class="modal">
        <div class="modal-content">
            <span class="close">×</span>
            <div id="modalWpm"></div>
            <div id="modalAccuracy"></div>
        </div>
    </div>
</body>
</html>
