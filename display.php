<?php
// Configuration file
require_once 'process/config.php';

// Query to retrieve the image and form data from the database
$query = "SELECT * FROM success";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $image_path = $row['image_path'];
    $facebook_name = $row['facebook_name'];
    $gcash_name = $row['gcash_name'];
    $gcash_number = $row['gcash_number'];
    $contact_number = $row['contact_number'];

    // Display the image and form data
    echo "<img src='$image_path' alt='Uploaded Image'>";
    echo "<p>Facebook Name: $facebook_name</p>";
    echo "<p>Gcash Name: $gcash_name</p>";
    echo "<p>Gcash Number: $gcash_number</p>";
    echo "<p>Contact Number: $contact_number</p>";
  }
} else {
  echo "No data found";
}
?>