<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'sms';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Messaging interface
if (isset($_POST['send_message'])) {
    $message = $_POST['message'];
    $user_id = $_POST['user_id'];

    // Retrieve user information
    $user_query = "SELECT * FROM users WHERE user_id = '$user_id'";
    $user_result = $conn->query($user_query);
    if ($user_result->num_rows > 0) {
        $user_data = $user_result->fetch_assoc();

        // Insert message into Messages table
        $message_query = "INSERT INTO messages (admin_id, user_id, message, timestamp) VALUES (1, '$user_id', '$message', NOW())";
        $conn->query($message_query);

        echo "Message sent successfully!";
    } else {
        echo "User   not found!";
    }
}

// Display notifications for the current user
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $notification_query = "SELECT * FROM messages WHERE user_id = '$user_id' AND read_status = 0";
    $notification_result = $conn->query($notification_query);
    if ($notification_result->num_rows > 0) {
        while ($notification = $notification_result->fetch_assoc()) {
            echo "<p>New message from admin: " . $notification['message'] . "</p>";
        }
    }
}

// Close connection
$conn->close();
?>