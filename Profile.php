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
<html>
<head>
<link rel="stylesheet" href="sidebar.css">
<title></title>

<link rel="stylesheet" href="Shops.css">
<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	

  </head>
  <body>

  <style>
   body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3e5f5;
        }
        .sidenav {
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #ffffff;
            overflow-x: hidden;
            transition: 0.5s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
            width: 250px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
           
        }
        .sidenav.closed {
            width: 90px;
        }

        .sidenav.closed img{
          align-items: center;
          display: flex;
          justify-content: center;
        
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            font-size: 25px;
            color: #818181;
            display: flex;
            align-items: center;
            transition: 0.3s;
            text-decoration: none;
            width: 100%;
            justify-content: center;
           
        }
        .sidenav a:hover {
            color: #f1f1f1;
        }
        .closebtn {
            font-size: 24px;
            cursor: pointer;
            padding: 8px 8px 8px 32px;
            align-self: flex-start;
       
        }
        .profile {
            text-align: center;
            padding-top: 10vh;
            margin-left: 3vh;
            transition: opacity 0.3s, transform 0.3s;
        }
        .profile img {
            width: 150px;
            height: 150px;
            border: 2px solid #7A288A;
            transition: width 0.3s, height 0.3s;
            margin-left: 3vh;
        }
        .profile h2 {
            font-size: 24px;
            color: #ccc;
            margin: 10px 0;
            transition: opacity 0.3s;
        }
        .fggs {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 3vh;
            border-radius: 5px;
            cursor: pointer;
            transition: opacity 0.3s;
        }
        .fggs img {
            font-size: 24px;
            border: 2px solid #7A288A;
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }
        .fggs span {
            font-size: 18px;
            transition: opacity 0.3s;
            display: flex;
            justify-content: flex-start;
            align-self: flex-start;
        }
        .sidenav.closed .profile {
            height: auto;
        }
        .sidenav.closed .profile img {
            width: 40px;
             height: 40px;
             border: none;
             border-radius: 10px;
        }
        .sidenav.closed .fggs {
            display: flex;
          
        }
        .sidenav.closed .profile h2,
        .sidenav.closed .fggs span,
        .sidenav.closed ul li a span {
      
      
            opacity: 0;
            width: 0;
            display: none;
        }
      
        .topbar {
            height: 60px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .topbar input {
            width: 300px;
            height: 40px;
            border-radius: 20px;
            border: 1px solid #d1c4e9;
            padding: 0 20px;
            font-size: 16px;
            background-color: #f3e5f5;
        }
        .topbar .icons {
            display: flex;
            align-items: center;
        }
        .topbar .icons i {
            font-size: 20px;
            margin: 0 10px;
        }
        .topbar .icons img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.5s;
        }
        .content.collapsed {
            margin-left: 85px;
        }
        .tabs {
            display: flex;
            margin-bottom: 20px;
        }
        .tabs button {
            background-color: #7e57c2;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .tabs button.active {
            background-color: #1e88e5;
        }
        .chart-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
  </style>


<style>

    body {
        background-color: #f7ebfa;
    }
      .profile-container1 {
            position: relative;
            width: 50px;
            height: 50px;
         
        }
        .profile-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-image: url('<?php echo $photo_path; ?>');
            background-size: cover;
            background-position: center;
        }
        .dropdown-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 20px;
            height: 20px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
        }
        .dropdown-icon i {
            font-size: 12px;
        }

          .user-profile-widget {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #ffff;   
    width: 500px;
    height: 400px;
  }

  .dropdown {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  padding: 10px;
  border: 1px solid #ccc;
  top: 100%;
  left: 0;
  z-index: 1;
}

.profile-container1 {
  overflow: visible;
}

.profile-container1:hover .dropdown {
  display: block;
}
  
.U-name {
    display: flex;
    justify-content: center;
    align-items: center;

  }
  
  .profile-info-widget p {
    margin-bottom: 10px;
  }

</style>

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





  <div class="content" id="mainContent">

<div class="profile-container">
  

    <div class="user-profile-widget">
        <div class="profile-picture-widget">
        <img src="<?php echo $photo_path; ?>" alt="Profile Photo" class="profile-photo">
        </div>

        <div class="profile-info-widget">
        <a href="acc_set.php">    <span class="SU-setting"><img src="gear.svg" width="30" height="20"></span></a>
            
            <h2 class="U-name"><?php echo $name; ?></h2>
          
            <div class="social-icons-widget">
                <a href="#" target="_blank">
                    <img src="fb.svg" class="U-icon1" alt="" />
                </a>
                <a href="#" target="_blank">
                    <img src="email.svg" class="U-icon2" alt="" />
                </a>
                <a href="#" target="_blank">
                    <img src="whatapp.svg" class="U-icon3" alt="" />
                </a>
            </div>
        </div>

        <div class="stats-widget">
            <div class="stat-item">
                <h3>4851</h3>
                <p>Wallets Balance</p>
            </div>

            <div class="stat-item">
                <h3>10250</h3>
                <p>Income amounts</p>
            </div> <br><br>

            <div class="stat-item">
                <h3>895</h3>
                <p>Total Transactions</p>
            </div>
        </div>
    </div>
</div>
</div>

<script>
      function toggleNav() {
            var sidenav = document.getElementById("mySidenav");
            var mainContent = document.getElementById("mainContent");
            sidenav.classList.toggle("closed");
            mainContent.classList.toggle("collapsed");
        }
</script>
    
    <script src="menu.js"></script>