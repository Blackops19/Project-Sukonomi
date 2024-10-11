<?php
include 'process/dbh.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $middle_name = isset($_POST['no_middle_name']) ? 'N/A' : $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $target_dir = "uploads/";
    $photo_path = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_path);

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        echo " <script>alert('Email address already exists.');</script>";
       
    }else {

    // Hash the password using password_hash()
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (name, middle_name, last_name, age, gender, birthday, contact_number, address, photo_path, email, password, login_attempts, Status) 
            VALUES ('$name', '$middle_name', '$last_name', '$age', '$gender', '$birthday', '$contact_number', '$address', '$photo_path', '$email', '$hashed_password', 0, 1)";

    if ($conn->query($sql) === TRUE) {
        // Automatically log the user in and redirect to the dashboard
        $user_id = $conn->insert_id;
        session_start();
        $_SESSION['user_id'] = $user_id;
        header("Location: dashboard.php");
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
      height: 960px;
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
    function toggleMiddleNameField() {
        const middleNameField = document.querySelector('input[name="middle_name"]');
        const noMiddleNameCheckbox = document.querySelector('input[name="no_middle_name"]');

        if (noMiddleNameCheckbox.checked) {
            middleNameField.value = 'N/A';
            middleNameField.disabled = true;
            middleNameField.classList.add('valid');  // Add valid class for the green outline
            middleNameField.classList.remove('invalid');
        } else {
            middleNameField.value = '';
            middleNameField.disabled = false;
            middleNameField.classList.remove('valid');
            middleNameField.classList.remove('invalid');
        }
        validateForm();
    }

    function validateForm() {
        const formElements = document.querySelectorAll('input, textarea');
        let isFormComplete = true;

        formElements.forEach(element => {
            if (element.required && !element.disabled) {
                if (element.value.trim() === '') {
                    element.classList.remove('valid');
                    element.classList.add('invalid');
                    isFormComplete = false;
                } else {
                    element.classList.remove('invalid');
                    element.classList.add('valid');
                }
            } else if (element.disabled && element.value.trim() === 'N/A') {
                element.classList.remove('invalid');
                element.classList.add('valid');
            }
        });

        // Ensure the submit button has the correct state
        document.querySelector('input[type="submit"]').disabled = !isFormComplete;
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Initial form validation
        validateForm();

        // Add event listener for input changes
        document.querySelectorAll('input, textarea').forEach(input => {
            input.addEventListener('input', validateForm);
        });

        // Add event listener for checkbox change
        document.querySelector('input[name="no_middle_name"]').addEventListener('change', toggleMiddleNameField);
    });
</script>


</head>
<body>
    <div class="container">
    <h2>Register</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required>
        
        <label>Middle Name:</label>
        <input type="text" name="middle_name"><br>
        <input type="checkbox" name="no_middle_name" value="1" onchange="toggleMiddleNameField()"> I don't have a Middle Name
        
        <label>Last Name:</label>
        <input type="text" name="last_name" required>
        
        <label>Age:</label>
        <input type="number" name="age" required>
        
        <label class="form-label">Gender:</label>
      
        <section class="gname">
  <div class="g2name">
    <div class="g1">
        <input type="radio" name="gender" class="form-radio"   value="Male" required> Male
        </div>
        <div class="g1">
        <input type="radio" name="gender" class="form-radio"   value="Female" required> Female
        </div>
        <div class="g1">
        <input type="radio" name="gender" class="form-radio"  value="Other" required> Other
        </div>
        </div>
        </section>
 
        
        <label>Birthday:</label>
        <div class="bname">
        <input type="date" class="b1"  name="birthday" required>
        </div>
       
        <label>Contact Number:</label>
        <input type="text" name="contact_number" id="contact_number" required
                pattern="\d{11}" maxlength="11" inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">


        <label>Address:</label>
        <textarea name="address" required></textarea>
        
        <label>Photo:</label>
        <input type="file" name="photo" class="form-control" required>
        
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