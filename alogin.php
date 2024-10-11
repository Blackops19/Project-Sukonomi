<?php
session_start();
include 'process/dbh.php';
$ERROR = ""; 



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT Admin_id , password, Status, login_attempts, lockout_time FROM alogin WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['Status'] == 1) {
            echo "<script>alert('Your account is already active.');window.location.href='alogin.php';</script>";
        } else {
            // Verify the password using password_verify()
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin_id '] = $row['admin_id '];
               $status = "UPDATE alogin SET Status = 1, login_attempts = 0, lockout_time = 0 WHERE Admin_id  = " . $row['Admin_id '];
                if ($conn->query($status) === TRUE) {
                     echo "<script>alert('login Successfully.');window.location.href='adashboard.php';</script>";
                    exit();
                }
            } else {
                // Increment login attempts
    $login_attempts = $row['login_attempts'] + 1;
    $update_attempts = "UPDATE alogin SET login_attempts = $login_attempts WHERE Admin_id = " . $row['Admin_id'];
    $lockout_time = 0; // define the variable here
    $update_lockout = "UPDATE alogin SET lockout_time = $lockout_time WHERE Admin_id = " . $row['Admin_id'];
    $conn->query($update_attempts);

             if ($login_attempts >= 25) {
    // Lock out the user for 24 hours
    $lockout_time = time() + 86400; // 24 hours
    $update_lockout = "UPDATE alogin SET lockout_time = $lockout_time WHERE Admin_id  = " . $row['Admin_id '];
    $conn->query($update_lockout);
    $_SESSION['lockout_time'] = $lockout_time;
    $time_left = $lockout_time - time();
    echo "<script>alert(' This is your $login_attempts attempt since last open. Please try again after $time_left seconds.');window.location.href='alogin.php';</script>";
} elseif ($login_attempts >= 18) {
    // Lock out the user for 1 hour
    $lockout_time = time() + 3600; // 1 hour
    $update_lockout = "UPDATE alogin SET lockout_time = $lockout_time WHERE Admin_id  = " . $row['Admin_id '];
    $conn->query($update_lockout);
    $_SESSION['lockout_time'] = $lockout_time;
    $time_left = $lockout_time - time();
    echo "<script>alert(' This is your $login_attempts attempt since last open. Please try again after $time_left seconds.');window.location.href='alogin.php';</script>";
} elseif ($login_attempts >= 12) {
    // Lock out the user for 36 minutes
    $lockout_time = time() + 2160; // 36 minutes
    $update_lockout = "UPDATE alogin SET lockout_time = $lockout_time WHERE Admin_id  = " . $row['Admin_id '];
    $conn->query($update_lockout);
    $_SESSION['lockout_time'] = $lockout_time;
    $time_left = $lockout_time - time();
    echo "<script>alert(' This is your $login_attempts attempt since last open. Please try again after $time_left seconds.');window.location.href='alogin.php';</script>";
} elseif ($login_attempts >= 9) {
    // Lock out the user for 9 minutes
    $lockout_time = time() + 540; // 9 minutes
    $update_lockout = "UPDATE alogin SET lockout_time = $lockout_time WHERE Admin_id  = " . $row['Admin_id '];
    $conn->query($update_lockout);
    $_SESSION['lockout_time'] = $lockout_time;
    $time_left = $lockout_time - time();
    echo "<script>alert('This is your $login_attempts attempt since last open. Please try again after $time_left seconds.');window.location.href='alogin.php';</script>";
} elseif ($login_attempts >= 6) {
    // Lock out the user for 3 minutes
    $lockout_time = time() + 180; // 3 minutes
    $update_lockout = "UPDATE alogin SET lockout_time = $lockout_time WHERE Admin_id  = " . $row['Admin_id '];
    $conn->query($update_lockout);
    $_SESSION['lockout_time'] = $lockout_time;
    $time_left = $lockout_time - time();
    echo "<script>alert(' This is your $login_attempts attempt since last open. Please try again after $time_left seconds.');window.location.href='alogin.php';</script>";
} elseif ($login_attempts >= 3) {
    // Lock out the user for 30 seconds
    $lockout_time = time() + 30; // 30 seconds
    $update_lockout = "UPDATE alogin SET lockout_time = $lockout_time WHERE Admin_id  = " . $row['Admin_id '];
    $conn->query($update_lockout);
    $_SESSION['lockout_time'] = $lockout_time;
    $time_left = $lockout_time - time();
    echo "<script>alert(' This is your $login_attempts attempt since last open. Please try again after $time_left seconds.');window.location.href='alogin.php';</script>";
} else {
                    echo "<script>alert(' This is your $login_attempts attempt since last open.');window.location.href='alogin.php';</script>";
                    exit();
                }
            }
        }
       } else {
        echo "<script>alert('Email not found! ');window.location.href='alogin.php';</script>";
    }
}

// Check if the user is locked out
if (isset($_SESSION['lockout_time']) && $_SESSION['lockout_time'] > time()) {
    $lockout_time = $_SESSION['lockout_time'];
} else {
    $lockout_time = 0;
}

// Calculate the time left until the lockout is lifted
$time_left = $lockout_time - time();

// Convert the time left to minutes and seconds
$minutes = floor($time_left / 60);
$seconds = $time_left % 60;

    $conn->close();


?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="lstyle.css">

  




</head>

<body>

<header>

<img src="Sfinal.png" alt="">
</header>
<div class="container">
    
  
<form method="POST" action="alogin.php">
    <input type="email" required placeholder="Enter your email" name="email" >
    <input type="password" required placeholder="Enter your password" name="password" ><br><br>

    <section>
       <div class="no-account-text"><a class="register-link" href="aregister.php">No Account Yet?</a></div> 
     

        <?php if ($lockout_time > time()) : ?>
         <button type="submit" class="login-btn" disabled style="background-color: #7A288A; color: white; box-shadow: #E9ECEF; ">Login</button>
            <script>
                // Update the time left every second
                setInterval(function() {
                    var minutes = <?php echo $minutes; ?>;
                    var seconds = <?php echo $seconds; ?>;
                    seconds--;
                    if (seconds < 0) {
                        minutes--;
                        seconds = 59;
                    }
                    document.querySelector('.login-btn').innerHTML = 'Login';
  if (minutes === 0 && seconds === 0) {
  document.querySelector('.login-btn').disabled = false;
  document.querySelector('.login-btn').style.backgroundColor = '#E9ECEF';
  document.querySelector('.login-btn').style.boxShadow = '#E9ECEF';
  document.querySelector('.login-btn').innerHTML = 'Login';
}
                }, 1000);
            </script>
        <?php else : ?>
            <button type="submit" class="login-btn">Login</button>
        <?php endif; ?><br>
    </form><br><br>

    
<div class="timer-container">
    <?php if ($lockout_time > time()) { ?>
        <div class="lockout-timer" id="timer">
            You are locked out for <span id="time"></span> minutes and <span id="seconds"></span> seconds. Please try again later.
        </div>
        <script>
            var timer = <?php echo $lockout_time - time(); ?>;
            var interval = setInterval(function() {
                var minutes = Math.floor(timer / 60);
                var seconds = timer % 60;
                document.getElementById("time").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;
                timer--;
                if (timer <= 0) {
                    clearInterval(interval);
                    document.getElementById("timer").innerHTML = "You can try again now, Refresh the page first.";
                }
            }, 1000); // update every 1 second
        </script>
    <?php } ?>
</div>
    </div>

</body>
</html>