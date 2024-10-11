<?php
session_start();
include 'process/dbh.php';
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    if (isset($_SESSION['admin_id'])) {
        $admin_id = $_SESSION['admin_id'];
    
        
        $update_status_sql = "UPDATE alogin SET Status = 0 WHERE Admin_id = $admin_id";
        if ($conn->query($update_status_sql) === TRUE) {
        
        }
    
    session_unset();
    session_destroy();
    header("Location: alogin.php");
    exit();
    }
}

if (isset($_GET['confirm']) && $_GET['confirm'] == 'no') {
    header("Location: adashboard.php"); // Redirect to the dashboard or another page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script>
        if (confirm("Are you sure you want to log out?")) {
            window.location.href = "alogout.php?confirm=yes";
        } else {
            window.location.href = "alogout.php?confirm=no";
        }
    </script>
</body>
</html>
