<?php
// delete_task.php

// Database connection
$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "EasyTask"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve task ID from POST request
$task_id = $_POST['task_id'];

// Prepare and bind
$stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
$stmt->bind_param("i", $task_id);

// Execute the statement
if ($stmt->execute()) {
    header("Location: All_task.php");
} else {
    echo "Error deleting task: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
