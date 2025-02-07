<?php
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP
$dbname = "EasyTask"; // updated name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Connection failed.");
}

// Fetch all tasks with user names
$sql = "SELECT tasks.id, tasks.title, tasks.description, tasks.created_at, tasks.updated_at, tasks.priority, tasks.status, users.name AS user_name FROM tasks JOIN users ON tasks.user_id = users.id";
$result = $conn->query($sql);

$tasks = [];
if ($result->num_rows > 0) {
    while ($task = $result->fetch_assoc()) {
        $tasks[] = [
            "id" => $task["id"],
            'title' => $task['title'],
            'description' => $task['description'],
            'created_at' => $task['created_at'],
            'updated_at' => $task['updated_at'],
            'priority' => $task['priority'],
            'status' => $task['status'],
            'user_name' => $task['user_name']
        ];
    }
}

$conn->close();
?>
