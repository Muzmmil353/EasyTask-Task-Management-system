<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EasyTask";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Connection failed.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_input = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=? OR email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login_input, $login_input);
    $stmt->execute();
    $result = $stmt->get_result();

if ($result->num_rows > 0) {
    error_log("User found: " . print_r($user, true));
        $user = $result->fetch_assoc();
        if ($user['password'] === $password) {

            $_SESSION['user_id'] = $user['id'];
header("Location: dashboard.html");
            exit();
        } else {
            header("location: login.html");
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
