<?php
include 'process/dbh.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE user SET silver_balance = silver_balance + 1 WHERE User_id=?");
    $stmt->bind_param("i", $user_id);

    // Execute the SQL statement
    $stmt->execute();

    // Redirect to silver_raf.php
    header('Location: silver_raf.php');
    exit();
}
?>