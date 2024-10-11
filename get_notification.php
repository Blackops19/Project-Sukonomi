<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "sms");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve notifications for the current user
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM user WHERE user_id = '$user_id' AND is_read = 0"; // Select unread notifications
$result = mysqli_query($conn, $sql);

$notifications = array();
while ($row = mysqli_fetch_assoc($result)) {
    $notifications[] = $row;
}

// Output notifications in JSON format
echo json_encode($notifications);

// Close database connection
mysqli_close($conn);
?>