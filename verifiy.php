<?php
// Include the database connection file
include 'database.php';

// Set the CAPTCHA data
$captcha_data = array(
    array('id' => 1, 'image' => 'assets/laz.jpeg', 'answer' => 'Lazada'),
    array('id' => 2, 'image' => 'assets/amazon.jpeg', 'answer' => 'Amazon'),
    array('id' => 3, 'image' => 'assets/google.jpeg', 'answer' => 'Google'),
    array('id' => 4, 'image' => 'assets/facebook.jpeg', 'answer' => 'Facebook'),
    array('id' => 5, 'image' => 'assets/X.jpeg', 'answer' => 'Twitter'),
    array('id' => 6, 'image' => 'assets/microsoft.jpeg', 'answer' => 'Microsoft'),
    array('id' => 7, 'image' => 'assets/apple.jpeg', 'answer' => 'Apple')
);

// Set the CAPTCHA data in a JSON file
file_put_contents('captcha.json', json_encode($captcha_data));

// Function to generate a random CAPTCHA answer
function generate_random_answer($captcha_data) {
    $random_index = array_rand($captcha_data);
    return $captcha_data[$random_index];
}

// Function to validate the user's CAPTCHA answer
function validate_captcha($captcha_answer, $captcha_id, $captcha_data) {
    foreach ($captcha_data as $captcha) {
        if ($captcha['id'] == $captcha_id && $captcha['answer'] === $captcha_answer) {
            return true;
        }
    }
    return false;
}

// Function to get a random image
function get_random_image($captcha_data) {
    $random_index = array_rand($captcha_data);
    return $captcha_data[$random_index]['image'];
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $captcha_id = $_POST['captcha_id'];
    $captcha_answer = $_POST['captcha'];

    // Validate the CAPTCHA answer
    if (validate_captcha($captcha_answer, $captcha_id, $captcha_data)) {
        // CAPTCHA is valid, proceed with the form submission
        // Use a prepared statement to retrieve the user's email address
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $email = $row['email'];
            }
        }

        // Redirect to the next page or perform the desired action
        header("Location: reset_password.php?email=$email");
        exit();
    } else {
        // CAPTCHA is invalid, display an error message
        $error_message = "Invalid CAPTCHA answer. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify User</title>
    <link rel="stylesheet" href="fstyle.css">
    <style>
        img {
            width: 400px;
            height:300px;
        }
        .h-custom {
            height: 100vh;
            position: relative;
        }
        .logo {
            position: absolute;
            top: 10px;
            left: 20px;
            max-width: 400px;
        }
        .container1 {
            position: fixed;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }
    </style>
</head>
<body>
    <div class="container1">
        <h2>VERIFY</h2>
        <input type="hidden" id="email-input" value="<?php echo $_GET['email']; ?>">
        <form method="post">
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
             
            <?php
            // Generate a random CAPTCHA answer and store it
            $random_captcha = generate_random_answer($captcha_data);
            $captcha_id = $random_captcha['id'];
            ?>
            <div class="company-section">
                <label>What is the logo in the image?</label><br>
                <label> Starts With Capital Letters:</label>
                <img src="<?php echo $random_captcha['image']; ?>" alt="Logo Quiz"><br>
                <input type="hidden" name="captcha_id" value="<?php echo $captcha_id; ?>">
                <input type="text" name="captcha" required>
                                <br><br>
                <?php if (isset($error_message)) { ?>
                    <p class="text-danger"><?php echo $error_message; ?></p>
                <?php } ?>
            </div>
            <section>
                <input type="submit" class="login-btn" value="Continue">
            </section>
        </form>
    </div>
</body>
</html>