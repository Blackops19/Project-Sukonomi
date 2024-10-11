


<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM employee";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>

<html>
<head>
	<title>Subscribe</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	<header>
		<nav>
			<h1>GLOBAL</h1>
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

		<table>
			<tr>

				<th align = "center">Emp. ID</th>
				<th align = "center">Picture</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Birthday</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact</th>
				<th align = "center">Location</th>
				<th align = "center">Clients</th>
				<th align = "center">Links</th>
				<th align = "center">click Count</th>
				<th align = "center">Options</th>
			</tr>

			<?php
			$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['email']."</td>";
					echo "<td>".$employee['birthday']."</td>";
					echo "<td>".$employee['gender']."</td>";
					echo "<td>".$employee['contact']."</td>";
				   echo "<td>".$employee['location']."</td>";
					echo "<td>".$employee['clients']."</td>";
					echo "<td>".$employee['link']."</td>";
					echo "<td>".$employee['click_count']."</td>";

					echo "<td><a href=\"edit.php?id=$employee[id]\">Edit</a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

            

          $seq+=1;
		  	}
			?>

		</table>


	
</body>
</html>