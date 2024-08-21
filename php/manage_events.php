<?php
include 'db.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $creator_id = $_SESSION['user_id'];
    $result = $conn->query("SELECT * FROM events WHERE creator_id = $creator_id");

    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p>" . $row['date'] . " at " . $row['location'] . "</p>";
        echo "<a href='edit_event.php?id=" . $row['id'] . "'>Edit</a>";
        echo "<a href='delete_event.php?id=" . $row['id'] . "'>Delete</a>";
        echo "</div>";
    }

    $conn->close();
}
?>
