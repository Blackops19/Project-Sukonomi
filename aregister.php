<?php
include 'process/dbh.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM alogin WHERE email = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        echo " <script>alert('Email address already exists.');</script>";
       
    }else {

    // Hash the password using password_hash()
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO alogin (name, email, password) 
            VALUES ('$name', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Automatically log the user in and redirect to the dashboard
        $admin_id  = $conn->insert_id;
        session_start();
        $_SESSION['admin_id '] = $admin_id ;
        header("Location: adashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="rstyle.css">
   
    <style>
        /* Default input outline color */
        input, textarea {
         
      
            padding: 5px;
            margin-bottom: 10px;
        }

        /* Green outline for valid inputs */
        .valid {
            border-color: green;
        }

        /* Red outline for invalid inputs */
       

        /* Disables the input field */
        input[disabled], textarea[disabled] {
            background-color: #e9ecef;
        }

        
  input[type="submit"] {
      background-color: #e9ecef; 
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      margin-top: 20px;
  }

  
.REG {  
    
    background-color: #8B0A8B; /* Violet color */
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 400px;
    box-shadow: 0 5px 0 #e9ecef; /* Add a shadow to create a 3D effect */
    transition: all 0.2s ease-in-out; /* Add a transition effect */
    }
    
    .REG:hover {
    background-color: #8B0A8B; /* Darker violet color on hover */
    transform: translateY(-2px); /* Move the button up on hover */
    box-shadow: 0 7px 0 #5C1A6D; /* Increase the shadow on hover */
    }
    
    .REG:active {
    transform: translateY(2px); /* Move the button down on click */
    box-shadow: 0 3px 0 #8B0A8B; /* Decrease the shadow on click */
    }
    

        
  .container {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      width: 400px;
      height: 300px;
      margin-top: 10vh;
      margin-bottom: 10vh;
  }

  .photo {
border: none;
}

.form-control {
            width: 94.5%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Add event listener for input changes
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', () => {
                if (input.required && input.value.trim() === '') {
                    input.classList.remove('valid');
                    input.classList.add('invalid');
                } else {
                    input.classList.remove('invalid');
                    input.classList.add('valid');
                }
            });
        });
    });
</script>


</head>
<body>
    <div class="container">
    <h2>Register</h2>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required>
        
        <label>Email:</label>
        <input type="email" name="email" required>
        
        <label>Password:</label>
        <input type="password" name="password" required>
        
 <input type="submit" class="REG"  value="Register">
      
    </form>
    <section class="no-account-text"><br><br><br><br><br>
    <a href="login.php" class="login-link"> Already have an account?</a>
    </section>
   
    </div>


</body>
</html>