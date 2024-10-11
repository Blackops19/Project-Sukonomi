
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


<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM employee";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>



<html>
<head>
	<title>Subscribe</title>
	<style>
		
		body{
		background-color: #90EE90;
		}
		
		
		
		.rank-table {
    width: 90%;
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

   /* Custom CSS for Notification UI */
        .navbar-brand {
            font-size: 24px;
        }
        .notification {
            padding: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .notification:hover {
            background-color: #f5f5f5;
        }
        .notification-icon {
            float: left;
            margin-right: 10px;
            background-color: #4285f4;
            color: #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
        }
        .notification-text {
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .notification-drop-title {
            font-weight: bold;
            padding: 10px;
            background-color: #f5f5f5;
            border-bottom: 1px solid #ddd;
        }


     .dropdown {
  position: relative;
}

.dropdown .dropdown-toggle:focus + .dropdown-menu {
  position: fixed;
  top: 12%;
  right: 0.4%;
  display: block;
  width: 300px;
  height: 400px;
}

.dropdown-menu {
  position: absolute;
  top: 50%;
  right: 0;
  display: none;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  padding: 10px;
  z-index: 1;
}

.dropdown-menu li {
  margin-bottom: 10px;
}

.dropdown-menu li:last-child {
  margin-bottom: 0;
}

	</style>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="menu.css">
</head>
<body>
	
<div class="topnav">
    <div class="topnav-left">
    <a href="#" id="menu-icon" class="closebtn" onclick="openNav()">
  <img src="assets/2-removebg-preview (1).png" alt="icon" width="40" height="40">
</a>

<!-- Side navigation menu -->
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
   <span id="silver-balance" class="label label-pill label-danger count"   style=" font-size: 12px;  font-weight: bold; background-color: #FF3737; padding: 3px 6px; border-radius: 50%; color: #fff; "><?php echo $silverBalance;?></span>
</a>
 




<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
              
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="notification-icon">
                       <span class="label label-pill label-danger count" id="unread-count" style="position: absolute; top: 42px; right: 1px; font-size: 12px; font-weight: bold; background-color: #FF3737; padding: 3px 6px; border-radius: 50%; color: #fff;">1</span>
  <img src="assets/4.png" alt="icon" width="40" height="40" style="border-radius: 50%; margin-right: 10px;">
                    </a>       
                    <ul class="dropdown-menu">
                        <li class="notification-drop-title">Notifications</li>
                        <!-- notification list will be populated here -->
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 

  <script>
    // JavaScript code to populate notification list and update unread count
var userId = <?php echo $_SESSION['user_id']; ?>; // assume user ID is stored in session

function populateNotifications() {
    $.ajax({
        type: 'GET',
        url: 'get_notifications.php', // PHP script to retrieve notifications
        data: { user_id: userId },
        success: function(notifications) {
            var notificationList = "";
            notifications.forEach(function(notification) {
                notificationList += "<li><a href='Notification_Details.php?id=" + notification.id + "'>";
                notificationList += "<div class='notification'>";
                notificationList += "<div class='notification-icon'><i class='glyphicon glyphicon-bell'></i></div>";
                notificationList += "<div class='notification-text'>";
                notificationList += "<p><b>" + notification.comment_subject + "</b></p>";
                notificationList += "<p>" + notification.comment_text + "</p>";
                notificationList += "</div></div></a></li>";
            });
            $(".dropdown-menu").append(notificationList);
            updateUnreadCount(notifications.length);
        }
    });
}

function updateUnreadCount(count) {
    $("#unread-count").text(count);
}

// Call the function to populate notifications
populateNotifications();

// Add click event listener to the notification icon
$("#notification-icon").click(function() {
    updateUnreadCount(0);
    // You may want to send an AJAX request to mark notifications as read
});
</script>

</div>

  <a href="Profile.php">
    <img src="<?php echo $photo_path; ?>" alt="profile" width="40" height="40" style="border-radius: 50%">
  </a>
    </div>
	</div>

	 
	
		
	
		
		
		<div class="topnav1">
  <a href="#">Global</a>
  <a href="#">Bussiness</a>
  <a href="#">Entertainment</a>
  <a href="#">Gaming</a>
 
</div>







		                     
		
		
    	<table class="rank-table">
    <tr class="rank-header" bgcolor="#000">
        <th align="center" class="rank-cell">Ranking</th>
        <th align="center" class="rank-cell">Profile</th>
        <th align="center" class="rank-cell">Account Name</th>
       
		<th align="center" class="rank-cell">Links</th>
        
		<th align="center" class="rank-cell">Click Count</th>
    
    </tr>

    <?php



				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
				
          echo "<tr>";
					echo "<td>".$seq."</td>";
					echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
					echo "<td>".$employee['clients']."</td>";
				
					
					echo "<td><p id=\"carrier\"></p>
					<a id=\"display\" href=\"" . $employee['link'] . "\" target=\"_blank\" onclick=\"showPopup(); return clickLimit(this);\">".$employee['link']."</a></td>";
				
					echo "<div id='popup' style='display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);'>
					<div style='background-color: #fff; padding: 20px; border: 1px solid #000; border-radius: 10px; width: 50%; margin: 40px auto; overflow-y: auto; max-height: 80vh;'>
					  <h1>Save This For Later</h1>
					  <h3>Step 1:</h3>
					  <img src='Screenshot 2024-07-20 074802.png' alt='Step 1 Image' style='width: 200px; height: 150px; margin: 0 auto; display: block;'>
					  <p>Log in to your Facebook account.</p>
					  <!-- ... -->
					  <button id='submit-btn'>Submit</button>
					</div>
				  </div>
				  
				<!-- Second popup -->
				<div id='popup2' style='display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);'>
				  <div style='background-color: #fff; padding: 20px; border: 1px solid #000; border-radius: 10px; width: 50%; margin: 40px auto; overflow-y: auto; max-height: 80vh;'>
					<h1>Submit Your Image</h1>     
          
   
				 
				
					
					<!-- Add drag and drop functionality -->
					<form action='insert.php' method='post' enctype='multipart/form-data'>
				
				<div id='drag-drop-area' style='border: 1px dashed #ccc; padding: 20px; border-radius: 10px; overflow-y: auto; max-height: 300px;'>
  <p id='drag-drop-text' style='margin: 10px 0;'>Drag & drop an image or <input type='file' id='image-input' name='image' required style='margin: 10px 0;'> </p>
  <div id='image-preview' style='margin: 10px 0;'></div>
</div>
      
<label>Input your User ID</label>
        <input type='text' name='user_id' placeholder='Paste your User ID' required>
		
				  <button id='submit-btn'>Submit</button>
			
				</form>
				
				  </div>

				</div>";
				
				
				// Add the JavaScript code to show and hide the popup
				echo "<script>
				function showPopup() {
				  document.getElementById('popup').style.display = 'block';
				}
				
				function hidePopup() {
				  document.getElementById('popup').style.display = 'none';
				}
				
				function showPopup2() {
				  document.getElementById('popup2').style.display = 'block';
				}
				
				function hidePopup2() {
				  document.getElementById('popup2').style.display = 'none';
				}
				
				document.getElementById('submit-btn').addEventListener('click', function() {
				  hidePopup();
				  showPopup2();
				});
				
				document.getElementById('close-btn').addEventListener('click', function() {
				  hidePopup2();
				});
				</script>";
				
					
				
						echo "<td>".$employee['click_count']."</td>";
		
				
				
					
			
					
					
					$seq+=1;
				}
				?>

</table>










	</div>


		</h2>


		
		
	</div>
	<script>
   


   const imageInput = document.getElementById('image-input');
  const imagePreview = document.getElementById('image-preview');
  const dragDropArea = document.getElementById('drag-drop-area');
  const dragDropText = document.getElementById('drag-drop-text');

  imageInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();

    reader.onload = (event) => {
      imagePreview.innerHTML = `<img src="${event.target.result}" alt="Selected Image" style="max-width: 100%; height: auto;">`;
      dragDropText.style.display = 'none';
    };

    reader.readAsDataURL(file);
  });

  dragDropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
  });

  dragDropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    const files = e.dataTransfer.files;
    if (files.length > 0) {
      const file = files[0];
      const reader = new FileReader();

      reader.onload = (event) => {
        imagePreview.innerHTML = `<img src="${event.target.result}" alt="Selected Image" style="max-width: 100%; height: auto;">`;
        dragDropText.style.display = 'none';
      };

      reader.readAsDataURL(file);
    }
  });


submitBtn.addEventListener('click', (e) => {
  e.preventDefault();
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'insert.php', true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      document.getElementById('response-message').innerHTML = 'Image submitted successfully!';
    } else {
      document.getElementById('response-message').innerHTML = 'Error submitting image!';
    }
  };
  xhr.send(formData);
});

  </script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   

  <script src="menu.js"></script>
</body>
</html>