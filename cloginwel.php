<?php 
require_once ('process/dbh.php');
$sql = "SELECT id, firstName,lastName,clients, dateofdraw,pic,prizes, status,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$result = mysqli_query($conn, $sql);
?>

<html>
<head>
	<title>Employee Panel | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>
	
	<header>
		<nav>
			<h1>Share</h1>
			<ul id="navli">
				<li><a class="homered" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
	<div>
		<!-- <h2>Welcome <?php echo "$empName"; ?> </h2> -->

		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">For Views</h2>
    	<table>

			<tr bgcolor="#000">
				<th align = "center">Ranking</th>
			    <th align = "center">Profile</th>
				<th align = "center">Account Name</th>
				<th align = "center">Date of Draw</th>
				<th align = "center">Status</th>
				
				<th align = "center">Prizes</th>
				

			</tr>



			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$seq."</td>";
					echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
					echo "<td>".$employee['clients']."</td>";
					echo "<td>".$employee['dateofdraw']."</td>";
					
					echo "<td><a href='cloginwel.php/".$employee['status']."'> <button class='btn btn--radius btn--"  .$employee['status']."' type='button'>".$employee['status']."</button></a></td>";
				
					echo "<td>".$employee['prizes']."</td>";
					$seq+=1;
				}


			?>

		</table>










	</div>


		</h2>


		
		
	</div>
</body>
</html>