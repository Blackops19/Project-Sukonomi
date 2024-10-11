<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $pop = true;
    $Login = 'login.php';
} else {
    $pop = false;
    $Login = '';
    include 'database.php';

    $user_id = $_SESSION['user_id'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_info'])) {
        // Update the user information
        $name = $_POST['name'];
        $middle_name = isset($_POST['no_middle_name']) ? NULL : $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $contact_number = $_POST['contact_number'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
            $target_dir = "uploads/";
            $photo_path = $target_dir . basename($_FILES["photo"]["name"]);
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_path)) {
                // Photo uploaded successfully
            } else {
                // Photo upload failed
               echo "Error uploading photo";
            }
        } else {
            // No photo uploaded, use the existing photo
            $sql = "SELECT photo_path FROM user WHERE User_id='$user_id'";
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();
            $photo_path = $user['photo_path'];
        }
      
    
 $sql = "UPDATE user SET name='$name', 
                middle_name='$middle_name', 
                last_name='$last_name', 
                age='$age', 
                gender='$gender', 
                birthday='$birthday', 
                contact_number='$contact_number', 
                address='$address', 
                photo_path='$photo_path', 
                email='$email' 
                WHERE User_id='$user_id'";

        if ($conn->query($sql) === TRUE) {
           
            echo  "<script>alert('Information updated successfully!');window.location.href='profile.php';</script>";
        } else {
            echo  "<script>alert('Error updating information: . $conn->error');window.location.href='account_settings.php';</script>";
        }
    }
}

$sql = "SELECT * FROM user WHERE User_id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

}
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="sidebar.css">
<head>
 
 
    <style>
   body {
            background-color: #f7ebfa;
        }
        .container {
            width: 95%;
            margin-top: 15vh;
         
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group, .row {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-control {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .row {
            display: flex;
            justify-content: space-between;
        }
        .col {
            flex: 1;
            margin-right: 10px;
        }
        .col:last-child {
            margin-right: 0;
        }
        .login-btn {
            background-color: #7A288A; /* Violet color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 400px;
            box-shadow: 0 5px 0 #5C1A6D; /* Add a shadow to create a 3D effect */
            transition: all 0.2s ease-in-out; /* Add a transition effect */
        }

        .login-btn:hover {
            background-color: #8B0A8B; /* Darker violet color on hover */
            transform: translateY(-2px); /* Move the button up on hover */
            box-shadow: 0 7px 0 #5C1A6D; /* Increase the shadow on hover */
        }

        .login-btn:active {
            transform: translateY(2px); /* Move the button down on click */
            box-shadow: 0 3px 0 #5C1A6D; /* Decrease the shadow on click */
        }

        .login-btn1{
            background-color: #7A288A; /* Violet color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 400px;
            box-shadow: 0 5px 0 #5C1A6D; /* Add a shadow to create a 3D effect */
            transition: all 0.2s ease-in-out; /* Add a transition effect */
            margin-left: 63vh;
       
        }

        .login-btn1:hover {
            background-color: #8B0A8B; /* Darker violet color on hover */
            transform: translateY(-2px); /* Move the button up on hover */
            box-shadow: 0 7px 0 #5C1A6D; /* Increase the shadow on hover */
        }

        .login-btn1:active {
            transform: translateY(2px); /* Move the button down on click */
            box-shadow: 0 3px 0 #5C1A6D; /* Decrease the shadow on click */
        }

        .profile-container {
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
		
		



     
    </style>
      
   
       

    </head>
<body>







    <div class="container">
        <form method="post" enctype="multipart/form-data"> 
            <div class="row mb-3">
                <div class="col">
                    <label for="firstname" class="form-label">First Name:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($user['name'], ENT_QUOTES); ?>" required>
                </div>
                <div class="col">
                    <label for="middlename" class="form-label">Middle Name:</label>
                    <input type="text" name="middle_name" class="form-control" value="<?php echo htmlspecialchars($user['middle_name'], ENT_QUOTES); ?>">
                    <input type="checkbox" name="no_middle_name" value="1" <?php echo is_null($user['middle_name']) ? 'checked' : ''; ?>> I don't have a Middle Name
                </div>
                <div class="col">
                    <label for="lastname" class="form-label">Last Name:</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($user['last_name'], ENT_QUOTES); ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email'], ENT_QUOTES); ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea name="address" class="form-control" required><?php echo htmlspecialchars($user['address'], ENT_QUOTES); ?></textarea>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="birthday" class="form-label">Birthday:</label>
                    <input type="date" name="birthday" class="form-control" value="<?php echo htmlspecialchars($user['birthday'], ENT_QUOTES); ?>" required>
                </div>
                <div class="col">
                    <label for="gender" class="form-label">Gender:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="Male" <?php echo $user['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo $user['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo $user['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>
                <div class="col">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" name="age" class="form-control" value="<?php echo htmlspecialchars($user['age'], ENT_QUOTES); ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="contact_number" class="form-label">Contact Number:</label>
                    <input type="text" name="contact_number" class="form-control" value="<?php echo htmlspecialchars($user['contact_number'], ENT_QUOTES); ?>" maxlength="11" pattern="\d{11}" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <div class="col">
        <label for="photo" class="form-label">Photo:</label>
        <input type="file" id="photo" name="photo" class="form-control" >
    </div>
            </div>
            <section>
            <button type="submit"  name="update_info"   class="login-btn">Save Change</button>  <a href="delete.php"> <input type="button" class="login-btn1" value="Delete My Account"></a>    

            </section>
        </form>
       

   
      
    </div>
  
    <script>
        <?php if ($pop): ?>
        window.alert("Please login first");
        window.location.href = "<?php echo $Login; ?>";
        <?php endif; ?>
    </script>

<script>
    function toggleNav() {
    var sidenav = document.getElementById('sidenav');
    sidenav.classList.toggle('closed');
}
</script>
<script src="menu.js"></script>

 

