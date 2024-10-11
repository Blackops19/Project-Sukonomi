<?php
session_start();

$silverBalance = 0;


if (!isset($_SESSION['user_id'])) {
    $pop = true;
    $Login = 'login.php';
} else {
    $pop = false;
    $Login = '';
    include 'process/dbh.php';
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT name, photo_path, silver_balance FROM user WHERE User_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $photo_path = $row['photo_path'];
        $silverBalance = $row['silver_balance'];
      
    } else {
        echo "<script>alert('Error fetching user information!');</script>";
        exit();
    }
}

?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="menu.css">
<style>
body {
  background-color: #90EE90;
  font-family: Arial, sans-serif;
}

.container {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 20px;
  margin-left: 9vh;


}

.card {
  background-color: #F5FFB7;
  border-radius: 10px;
  padding: 20px;
  text-align: center;
  width: 200px;
  height: 300px;
  
  
}

.image-container {
  height: 150px;
  width: 150px;
  border: 1px solid #ccc;
  margin: 0 auto 10px;
  background-color: #F0F0F0;
}

.arrow {
  font-size: 30px;
  margin: 0 20px;
}
</style>
</head>
<body>

<div class="topnav">
    <div class="topnav-left">
    <a href="#" id="menu-icon" class="closebtn" onclick="openNav()">
  <img src="assets/2-removebg-preview (1).png" alt="icon" width="40" height="40">
</a>

<div id="sidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
    <img src="assets/2-removebg-preview (1).png" alt="Close" width="40" height="40">
  </a>
 
  <ul style="list-style: none;">
  <li>
    <a href="udashboard.php">
      <img src="assets/12.png" alt="Home" width="40" height="40">
      Home
    </a>
  </li>
  <li>
    <a href="raffle_cat.php">
      <img src="assets/14.png" alt="Raffle Draw" width="40" height="40">
         Raffle 
    </a>
  </li>

  <li>
    <a href="Live_draw_cat.php">
      <img src="assets/16.png" alt="Shop" width="40" height="40">
    Live Draw
    </a>
  </li>

   <li>
      <a href="logout.php">
      <img alt="Power icon" height="40" src="assets/log.png" width="40"/>
      <span>Logout</span>
     </a>
  </li>

</ul>
</div>


</div>
    <div class="topnav-right">
	<a href="#">
    <img src="assets/10.png" alt="icon" width="40" height="40" style="border-radius: 50%">
    <span><span id="silver-balance"><?php echo $silverBalance;?></span></span>
  </a>

  <a href="#">
    <img src="assets/4.png" alt="icon" width="40"height="40" style="border-radius: 50%">
 
  </a>


  <a href="Profile.php">
    <img src="<?php echo $photo_path; ?>" alt="profile" width="40" height="40" style="border-radius: 50%">
  </a>
    </div>
	</div>

	 
	 


<h1>Cash Prize</h1>
<section class="container">

  <div class="card">
    <a href="silver_raf.php">
      <div class="image-container"></div>
    </a>

    <p>Description of reward</p>
  </div>
  <div class="card">
    <a href="silver_raf2.php">
      <div class="image-container"></div>
    </a>

    <p>Description of reward</p>
  </div>
  <div class="card">
    <a href="silver_raf3.php">
      <div class="image-container"></div>
    </a>

    <p>Description of reward</p>
  </div>

  <div class="card">
    <a href="silver_raf4.php">
      <div class="image-container"></div>
    </a>

    <p>Description of reward</p>
  </div>

</section>
  
    <script>
        <?php if ($pop): ?>
        window.alert("Please login first");
        window.location.href = "<?php echo $Login; ?>";
        <?php endif; ?>
    </script>

<script src="menu.js"></script>
</body>
</html>