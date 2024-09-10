<?php
// view_stats.php
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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = $_GET['username'];

    $stmt = $conn->prepare("SELECT high5, high10, high15, high20, accuracy5, accuracy10, accuracy15, accuracy20 FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo "High Score (5s): " . $row['high5'] . " - Accuracy: " . $row['accuracy5'] . "%<br>";
            echo "High Score (10s): " . $row['high10'] . " - Accuracy: " . $row['accuracy10'] . "%<br>";
            echo "High Score (15s): " . $row['high15'] . " - Accuracy: " . $row['accuracy15'] . "%<br>";
            echo "High Score (20s): " . $row['high20'] . " - Accuracy: " . $row['accuracy20'] . "%<br>";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
