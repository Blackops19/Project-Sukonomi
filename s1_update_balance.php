<?php
session_start();
include 'process/dbh.php';

if (isset($_POST['type']) && isset($_POST['amount']) && isset($_POST['user_id'])) {
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $user_id = $_POST['user_id'];

    $sql = "UPDATE user SET ";
    if ($type == "silver") {
        $sql .= "silver_balance = silver_balance + $amount";
    } elseif ($type == "gold") {
        $sql .= "gold_balance = gold_balance + $amount";
    } elseif ($type == "diamond") {
        $sql .= "diamond_balance = diamond_balance + $amount";
    }
    $sql .= " WHERE User_id = $user_id";

    $conn->query($sql);

    // Send a response back to the client to confirm the update
    echo "Balance updated successfully!";
} else {
    echo "Error updating balance!";
}
?>