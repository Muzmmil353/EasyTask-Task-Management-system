<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EasyTask";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$task_id = $_POST['task_id'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE tasks SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $task_id);

if ($stmt->execute()) {
    header("Location: All_task.php");
} else {
    echo "Invalid Task Id" . $stmt->error;
}

$stmt->close();
$conn->close();
?>
