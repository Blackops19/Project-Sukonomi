<?php
// Include the database connection file
include 'process/dbh.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $users_id_s4 = $_POST['users_id_s4'];
    $Name_s4 = $_POST['Name_s4'];
    $Date_s4 = $_POST['Date_s4']; // New field

    // Create the SQL query to insert the data into the database
    $sql = "INSERT INTO s4_winner (users_id_s4, Name_s4, Date_s4) 
            VALUES ('$users_id_s4', '$Name_s4', '$Date_s4')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Automatically log the user in and redirect to the dashboard
        $id = $conn->insert_id;
        session_start();
        $_SESSION['id'] = $id;
        echo "<script>alert('Submit Successfully!');window.location.href='adashboard.php';</script>";
        exit();
    } else {
        // Display an error message if the query fails
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');window.location.href='adashboard.php';</script>";
    }
    // Close the database connection
    $conn->close();
}
?>