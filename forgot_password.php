<?php
include 'database.php';
$ERROR = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Redirect to the verify page
        header("Location: verifiy.php?email=$email");
        exit();
    } else {
        $ERROR = "<script>alert('No user found with this email!');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="fstyle.css">
    <style>
        .h-custom{
            height: 100vh;
            position: relative;
        }
        .logo {
            position: absolute;
            top: 10px;
            left: 20px; 
            max-width: 200px; 
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Forgot Password</h2>
    <form method="post">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
     
        <?php echo "<p class='text-danger position-absolute' >". $ERROR."</p>" ; ?>
        
        
<section>
    <div class="no-account-text"><a class="register-link" href="register.php">No Account Yet?</a></div> 
    <div class="forgot-password"><a class="forgot-password-link" href="forgot_password.php">Forgot Password?</a></div>
    <input type="submit" class="login-btn" value="Continue">
    </section>
</form>
</div>
</body>
</html>
