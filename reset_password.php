<?php

include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // Check if new password and confirm password match
    if ($new_password !== $confirm_new_password) {
        echo "<script>alert('Passwords do not match!');window.location.href='Forgot_password.php';</script>";
    } else {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed_password, $email);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Password reset successful!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error resetting password: " . $conn->error . "');window.location.href='login.php';</script>";
        }
    }

    $stmt->close();
    $conn->close();
} else if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display the password reset form
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Reset Password</title>
            <link rel="stylesheet" href="restyle.css">
        </head>
        <body>
            <div class="container">
                <h2>Reset Password</h2>
                <form method="post">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <label>New Password:</label><br>
                    <input type="password" name="new_password" required><br>
                    <label>Confirm New Password:</label><br>
                    <input type="password" name="confirm_new_password" required><br><br>
                    <input type="submit" class="login-btn" value="Reset Password" onclick="return confirm('Are you sure you want to reset your password?');">
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "<script>alert('No user found with this email!');</script>";
    }
    $conn->close();
} else {
    echo "<script>alert('No email provided!');</script>";
}
?>

