<html>
<head>
	<title>Subscribe</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
  <style>
    .popup-image {
  width: 50%;
  height: auto;
  margin: 0 auto;
  display: block;
}

#image-form {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  #image-form label, #image-form input, #image-form button {
    flex: 1 0 20%; /* adjust the width to your liking */
    margin: 10px;
  }

  #image-form label {
    text-align: right;
    margin-right: 10px;
    font-weight: bold;
    color: #333;
  }

  #image-form input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  #image-form input:focus {
    border-color: #aaa;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  #image-form button {
    flex: 1 0 100%; /* make the button full width */
    margin-top: 20px;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  @import url('https://fonts.googleapis.com/css?family=Lobster');
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');

body{
	margin: 0px;
  background-color: #4CAF50;
}

header{
	background: black;
	color: white;
	padding: 8px 20px 6px 40px;
	height: 50px;
}

header h1{
	display: inline;
	font-family: 'Lobster', cursive;
	font-weight: 400;
	font-size: 32px;
	float: left;
	margin-top: 0px;
	margin-right: 10px;

}

nav ul {
	display: inline;
	padding: 0px;
	float: right;
}



.homered{
	background-color: red;
	padding: 30px 10px 22px 10px;
}

.divider{
	background-color: red;
	height: 5px;
}

.homeblack:hover{
	background-color: blue;
	padding: 30px 10px 21px 10px;

}

table {
margin: 0px;
  border-collapse: collapse;
  width: 100%;
  font-family: 'Montserrat', sans-serif;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:hover {background-color:#76D7C4;}

th {
  background-color: #4CAF50;
  color: white;
}

.p-t-20 {
  padding-top: 20px;
}

.btn {
  line-height: 40px;
  display: inline-block;
  padding: 0 25px;
  cursor: pointer;
  font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
  color: #fff;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
  font-size: 14px;
  font-weight: 700;
}

.btn--radius {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}

.btn--green {
  background: #57b846;
}

#navli {
  text-align: center;
  float: center;;
}
  #religion-chart-container {
            margin-left: 50vh;
            margin-right: 50vh;
            padding: 40px; 
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        #attendance-chart-container {
            margin-left: 50vh;
            margin-right: 50vh;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }






#name-input-container {
  background-color: #f0f0f0;
  width: 150px; /* Increased width to fit all form fields */
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  transform: translateY(0);
  transition: transform 0.3s ease-in-out;
}

#name-input-container:hover {
  transform: translateY(-5px);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

input[type="number"], input[type="text"], input[type="date"] {
  width: 90%; /* Increased width to fit the container */
  height: 40px;
  margin-bottom: 20px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="number"]:focus, input[type="text"]:focus, input[type="date"]:focus {
  border-color: #aaa;
  box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.2);
}

#add-name-btn {
  width: 90%; /* Increased width to fit the container */
  height: 40px;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #4CAF50;
  color: #fff;
  cursor: pointer;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#add-name-btn:hover {
  background-color: #3e8e41;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}
  
#s-ent {
  margin-left: 20px;
}
  
.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.button-container {
  margin: 20px;
}

.button-container button {
  margin-bottom: 10px;
}

.button-container form {
  display: none;
}

.button-container form.show {
  display: block;
}

.inll {
  margin-left: 95vh;
}

  </style>
</head>
<body>

	<header>
		<nav>
		
			<ul id="navli">
				<li><a class="homered" href="adashboard.php">INSERT SECTION</a></li>
        <li><a class="homered" href="adashboard.php">REMOVE SECTION</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
    
			 
        <li><a class="homeblack" href="viewemp.php">View Employee</a></li>
			
				
		
				<li><a class="homeblack" href="alogout.php">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>
	<div id="divimg">
	<div class="divider"></div>
	<div id="divimg">
	<div style="display: flex; justify-content: space-around; align-items: center;">
 </div>


 

 <h1>Welcome Boss</h1>
 <a href="live_link.php"><button class="inll">INSERT the LIVE LINK S1</button></a>


<div class="container">



<?php
// Include the database connection file
include 'process/dbh.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $users_id_s1 = $_POST['users_id_s1'];
    $Name_s1 = $_POST['Name_s1'];
    $Date_s1 = $_POST['Date_s1']; // New field

    // Create the SQL query to insert the data into the database
    $sql = "INSERT INTO s1_winner (users_id_s1, Name_s1, Date_s1) 
            VALUES ('$users_id_s1', '$Name_s1', '$Date_s1')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Automatically log the user in and redirect to the dashboard
        $id = $conn->insert_id;
        session_start();
        $_SESSION['id'] = $id;
        echo "<script>alert('Submit Successfully!');window.location.href='adashboard.php';</script>";
        exit();
    } else {
        // Display an error message if the query fails
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');window.location.href='adashboard.php';</script>";
    }
    // Close the database connection
    $conn->close();
}
?>

<div class="button-container">

    <button id="s-ent">Submit Winner S1</button>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myForm">
        <section id="name-input-container">
            <!-- form fields and submit button -->
            <input name="users_id_s1" type="number"  placeholder="User        ID"  ><br><br>
            <input name="Name_s1" type="text"  placeholder="User        Name Who Winner"  > <br><br>
            <input name="Date_s1" type="date" placeholder="Date"> <br><br>
            <button id="add-name-btn" type="submit">Add Name</button>
        </section>
    </form>
</div>





<div class="button-container">

    <button id="s-ent">Submit Winner S2</button>
    <form action="s2_reward.php" method="post" id="myForm">
        <section id="name-input-container">
            <!-- form fields and submit button -->
            <input name="users_id_s2" type="number"  placeholder="User       ID"  ><br><br>
            <input name="Name_s2" type="text"  placeholder="User       Name Who Winner"  > <br><br>
            <input name="Date_s2" type="date" placeholder="Date"> <br><br>
            <button id="add-name-btn" type="submit">Add Name</button>
        </section>
    </form>
</div>







<div class="button-container">

    <button id="s-ent">Submit Winner S3</button>
    <form action="s3_reward.php" method="post" id="myForm">
        <section id="name-input-container">
            <!-- form fields and submit button -->
            <input name="users_id_s3" type="number"  placeholder="User      ID"  ><br><br>
            <input name="Name_s3" type="text"  placeholder="User      Name Who Winner"  > <br><br>
            <input name="Date_s3" type="date" placeholder="Date"> <br><br>
            <button id="add-name-btn" type="submit">Add Name</button>
        </section>
    </form>
</div>









<div class="button-container">

    <button id="s-ent">Submit Winner S4</button>
    <form action="s4_reward.php" method="post" id="myForm">
        <section id="name-input-container">
            <!-- form fields and submit button -->
            <input name="users_id_s4" type="number"  placeholder="User     ID"  ><br><br>
            <input name="Name_s4" type="text"  placeholder="User     Name Who Winner"  > <br><br>
            <input name="Date_s4" type="date" placeholder="Date"> <br><br>
            <button id="add-name-btn" type="submit">Add Name</button>
        </section>
    </form>
</div>
</div>



<!-- The JavaScript code that makes the form appear -->
<script>
document.querySelectorAll('#s-ent').forEach(button => {
  button.addEventListener('click', function() {
    const form = this.nextElementSibling;
    form.classList.toggle('show');
  });
});
</script>

 



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

// Add an event listener to the dropdown icon
document.querySelector('.dropdown-icon').addEventListener('click', function() {
  // Toggle the show class on the popup container
  document.querySelector('.popup-container').classList.toggle('show');
});

function toggleNav() {
    var sidenav = document.getElementById('sidenav');
    sidenav.classList.toggle('closed');
}
</script>





    	
 

<?php
if (isset($_GET['updated']) && $_GET['updated'] == 'true') {
  echo "<script>alert('Link updated successfully!');</script>";
}
?>

</body>
</html>