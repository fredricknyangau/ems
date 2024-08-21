<?php
// Database configuration
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ems";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$location = $_POST['location'];
$reg_start_date = $_POST['reg_start_date'];
$reg_end_date = $_POST['reg_end_date'];
$ticket_price = $_POST['ticket_price'];
$speaker = $_POST['speaker'];
$speaker_bio = $_POST['speaker_bio'];

// Prepare SQL query
$sql = "INSERT INTO events (title, description, event_date, location, reg_start_date, reg_end_date, ticket_price, speaker, speaker_bio)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $title, $description, $date, $location, $reg_start_date, $reg_end_date, $ticket_price, $speaker, $speaker_bio);

if ($stmt->execute()) {
    echo "New event created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>

<a href="events.html">Back to Events</a>
