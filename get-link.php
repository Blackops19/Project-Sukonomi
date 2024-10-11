<?php
require_once 'process/dbh.php';

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT link FROM facebook_live_links WHERE id = 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $link_data = mysqli_fetch_assoc($result);
  $link = $link_data['link'];
  echo json_encode(['link' => $link]);
} else {
  echo json_encode(['error' => 'No link found']);
}

mysqli_close($conn);
?>