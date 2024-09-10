<?php
// leaderboards.php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP is empty
$dbname = "merztypedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$times = [5, 10, 15, 20];

foreach ($times as $time) {
    echo "<h2>Leaderboard for {$time} seconds</h2>";
    $stmt = $conn->prepare("SELECT username, high{$time}, accuracy{$time} FROM users ORDER BY high{$time} DESC LIMIT 10");
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $accuracy = $row["accuracy{$time}"];
            echo "Username: " . $row['username'] . " - High Score: " . $row["high{$time}"] . " - Accuracy: " . $accuracy . "%<br>";
        }
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
