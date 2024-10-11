<?php
session_start();

$silverBalance = 0;
$goldBalance = 0;
$diamondBalance = 0;

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



<?php
include 'process/dbh.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $users_id = $_POST['users_id'];
    $Lucky_number = $_POST['Lucky_number'];
    $Name = $_POST['Name'];
    $message = $_POST['message'];

    // Check if Lucky Number is already owned
    $check_sql = "SELECT * FROM user_entry_silver WHERE Lucky_number = '$Lucky_number'";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Error: Lucky Number is already owned!');window.location.href='silver_raf.php';</script>";
        exit();
    }

    // Check if maximum entries (10) have been reached
    $count_sql = "SELECT COUNT(*) as count FROM user_entry_silver  WHERE users_id = '$users_id'";
    $count_result = mysqli_query($conn, $count_sql);
    $count_row = mysqli_fetch_assoc($count_result);
  if ($count_row['count'] >= 10) {
    echo "<script>alert('Error: Maximum entries (10) have been reached!');</script>";
    echo "<a href='second_batch.php'><button>Navigate to Second Batch</button></a>";
    exit();
}

    $sql = "INSERT INTO user_entry_silver  (users_id, Lucky_number, Name, message) 
            VALUES ('$users_id','$Lucky_number','$Name','$message')";

    if ($conn->query($sql) === TRUE) {
        // Automatically log the user in and redirect to the dashboard
        $id = $conn->insert_id;
        session_start();
        $_SESSION['id'] = $id;
        header("Location: silver_raf.php");
        exit();
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');window.location.href='silver_raf.php';</script>";
    }
    $conn->close();
}
   
?>

<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM user_entry_silver";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>

















<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wheel of Fortune</title>
  <link rel="stylesheet" type="text/css" href="raf_style.css">
  	<link rel="stylesheet" type="text/css" href="styleview.css">
  <link rel="stylesheet" href="menu.css">
  <style>
  body {
    background-color: #90EE90;
  }

  #wheel-container {
    background-color: #F5FFB7;
  }
    #wheel {
      border-radius: 50%;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
#arrow {
  position: absolute;
  top: 0;
  left: 48.3%;

  transform: translateX(-50%);
  font-size: 24px;
  font-weight: bold;
  color: #000;
  margin-top: 26vh;

}

    #winner-output {
      font-size: 24px;
      font-weight: bold;
      color: #000;
    }
    #winner-history {
      position: absolute;
      top: 0;
      right: 20px;
      width: 200px;
      height: 400px;
      overflow-y: auto;
      background-color: #F5FFB7;
      padding: 10px;
      border: 1px solid #ddd;
    }
    #winner-history ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    #winner-history li {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
    #winner-history li:last-child {
      border-bottom: none;
    }

    		.rank-table {
   
	margin-left:10vh ;

	
    border-collapse: collapse;
}

.rank-row {
    background-color: #f0f0f0;
 
}

.rank-cell {
    padding: 10px;
    border: 1px solid #ddd;
  
}

.table1 {
      width: 80%;
      margin-right: 30vh;
}

.table2 {
width: 100%;
      
}

#s-ent {
  position: fixed;
  right: 5.5%;
  top:  15%;

}

/* style.css */
#facebook-live-container {
  width: 500px;
  height: 281px;
  border: 1px solid #ccc;
  padding: 10px;
}

#facebook-live-embed {
  width: 100%;
  height: 100%;
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

<div class="coin-balance" style="position: absolute; top: 10%; left: 50%; bottom: 20%">
   
</div>
  <main>
 
  

  <div id="facebook-live-container">
  <div id="facebook-live-embed"></div>
</div>

<script>
  const facebookLiveEmbed = document.getElementById('facebook-live-embed');

  fetch('get-link.php')
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        console.error(data.error);
        return;
      }
      const link = data.link;
      const embedCode = `
        <div class="fb-video" 
             data-href="${link}" 
             data-width="500" 
             data-show-text="false">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="${link}">
              <a href="${link}">Facebook Live</a>
            </blockquote>
          </div>
        </div>
      `;
      facebookLiveEmbed.innerHTML = embedCode;
      FB.XFBML.parse(); // parse the Facebook SDK
    })
    .catch(error => console.error(error));
</script>


<?php
require_once ('process/dbh.php');
$sql = "SELECT * FROM s1_winner";
$result = mysqli_query($conn, $sql);
?>

    
<section id="winner-history">
      <h2>Winner History</h2>
      <table id="winner-history-table"  class="table2"  style="width:100%; ">
        <tr>
          <th style="width: 100%;">User  ID</th>
          <th style="width: 100%;">Name</th>
        
       
             <th style="width: 100%;">Date</th>
        </tr>
        <?php
        $seq = 1;
        while ($s1_winner = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $s1_winner['users_id_s1'] . "</td>";
          echo "<td>" . $s1_winner['Name_s1'] . "</td>";
          echo "<td>" . $s1_winner['Date_s1'] . "</td>";
          echo "</tr>";
          $seq += 1;
        }
        ?>
      </table>
</section>
  </main>

  
    <script>
        <?php if ($pop): ?>
        window.alert("Please login first");
        window.location.href = "<?php echo $Login; ?>";
        <?php endif; ?>
    </script>
<script src="wheel.js"></script>

<script src="menu.js"></script>
</body>
</html>