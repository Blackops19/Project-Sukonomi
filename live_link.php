<?php
require_once 'process/dbh.php'; // database connection file

if (isset($_POST['update_link'])) {
  $link = $_POST['link'];
  $query = "INSERT INTO facebook_live_links (link) VALUES ('$link')";
  if (mysqli_query($conn, $query)) {
    ?>
    <script>
      alert("Link inserted successfully!");
      window.location.href = 'adashboard.php';
    </script>
    <?php
    exit;
  } else {
    echo "Error inserting link: " . mysqli_error($conn);
  }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="link">Facebook Live Link:</label>
  <input type="text" id="link" name="link" >
  <button type="submit" name="update_link">Insert Link</button>
</form>