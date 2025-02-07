<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Tasks</title>
</head>
<body style="display: flex;
    align-items: center;
    justify-content: center;
    font-family: Arial, sans-serif;
    background-image: url(background.jpg);
    background-size: cover;
    line-height: 1.5;
    min-height: 100vh;
    margin: 0;">

    <div style="text-align: center;">

        <h2 style="color: #007BFF;">All Tasks</h2>
        <div style="text-align: center;">
            <?php
            session_start(); // Start the session
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); // Redirect to login page if not logged in
        exit();
        }
        include 'fetch_tasks.php';

            if (!empty($tasks)) {
                echo "<table border='1' cellpadding='10' border: 2px solid #0098be;>
                        <tr>
                            <th>Task ID</th>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Created By</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Priority</th>
                            <th>Status</th>
                        </tr>";
                foreach ($tasks as $task) {
                    echo "<tr>
                            <td>" . htmlspecialchars($task['id']) . "</td>
                            <td>" . htmlspecialchars($task['title']) . "</td>
                            <td>" . htmlspecialchars($task['description']) . "</td>
                            <td>" . htmlspecialchars($task['user_name']) . "</td>
                            <td>" . htmlspecialchars($task['created_at']) . "</td>
                            <td>" . htmlspecialchars($task['updated_at']) . "</td>
                            <td>" . htmlspecialchars($task['priority']) . "</td>
                            <td>" . htmlspecialchars($task['status']) . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No tasks found.</p>";
            }
            ?>
        </div>
        
        <button style=" padding: 10px 15px;
                        background-color: #007bff;
                        color: white;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        margin-top: 20px; "
                        onclick="window.location.href='dashboard.html'">Dashboard</button>

        <button style=" padding: 10px 15px;
                        background-color: #007bff;
                        color: white;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        margin-top: 20px; "
                        onclick="window.location.href='create_task.html'">Create Task</button>

        <button style=" padding: 10px 15px;
                        background-color: #007bff;
                        color: white;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        margin-top: 20px; "
                        onclick="window.location.href='update_task.html'">Edit Task</button>

        <button style=" padding: 10px 15px;
                        background-color: #007bff;
                        color: white;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        margin-top: 20px; "
                        onclick="window.location.href='delete_task.html'">Delete Task</button>
    </div>
</body>
</html>
