<?php
include 'process/dbh.php';

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $sql = "SELECT silver_balance FROM user WHERE User_id='$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $silverBalance = $row['silver_balance'];
        if ($silverBalance < 1) {
            echo 'insufficient_balance';
        } else {
            $newSilverBalance = $silverBalance - 1;
            $sql = "UPDATE user SET silver_balance='$newSilverBalance' WHERE User_id='$user_id'";
            $conn->query($sql);
            echo $newSilverBalance;
        }
    } else {
        echo 'error';
    }
}
?>