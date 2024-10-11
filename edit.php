<?php
require_once ('process/dbh.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $nid = $_POST['nid'];
    $address = $_POST['address'];
    $dept = $_POST['dept'];
    $degree = $_POST['degree'];
    $clients = $_POST['clients'];
    $dateofdraw = $_POST['dateofdraw'];
    $link = $_POST['link'];
    $status = $_POST['status'];
    $prizes = $_POST['prizes'];

    $stmt = $conn->prepare("UPDATE `employee` SET `firstName`=?, `lastName`=?, `email`=?, `birthday`=?, `gender`=?, `contact`=?, `nid`=?, `address`=?, `dept`=?, `degree`=?, `clients`=?, `dateofdraw`=?,`link`=?,`status`=?, `prizes`=? WHERE id=?");
    if ($stmt) {
        $stmt->bind_param('sssssssssssssssi', $firstname, $lastname, $email, $birthday, $gender, $contact, $nid, $address, $dept, $degree, $clients, $dateofdraw, $link, $status, $prizes, $id);        $stmt->execute();
        $stmt->close();

        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Successfully Updated')
        window.location.href='viewemp.php';
        </SCRIPT>");
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>

<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$sql = "SELECT * FROM `employee` WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $result->num_rows > 0) {
    $res = $result->fetch_assoc();
    $firstname = $res['firstName'];
    $lastname = $res['lastName'];
    $email = $res['email'];
    $contact = $res['contact'];
    $address = $res['address'];
    $gender = $res['gender'];
    $birthday = $res['birthday'];
    $nid = $res['nid'];
    $dept = $res['dept'];
    $degree = $res['degree'];
    $clients = $res['clients'];
    $dateofdraw = $res['dateofdraw'];
    $link = $res['link'];
    $status = $res['status'];
    $prizes = $res['prizes'];
} else {
    // Handle the case when no employee is found
}
$stmt->close();
?>

<html>
<head>
    <title>View Employee |  Admin Panel | Employee Management System</title>
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<body>
    <header>
        <nav>
            <h1>EMS</h1>
            <ul id="navli">
                <li><a class="homeblack" href="index.html">HOME</a></li>
                <li><a class="homeblack" href="addemp.php">Add Employee</a></li>
                <li><a class="homered" href="viewemp.php">View Employee</a></li>
                <li><a class="homeblack" href="elogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="divider"></div>
    

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update Employee Info</h2>
                    <form id="registration" action="edit.php" method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="firstName" value="<?php echo htmlspecialchars($firstname); ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="lastName" value="<?php echo htmlspecialchars($lastname); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="birthday" value="<?php echo htmlspecialchars($birthday); ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="gender" value="<?php echo htmlspecialchars($gender); ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="number" name="contact" value="<?php echo htmlspecialchars($contact); ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" name="nid" value="<?php echo htmlspecialchars($nid); ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="address" value="<?php echo htmlspecialchars($address); ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="dept" value="<?php echo htmlspecialchars($dept); ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="degree" value="<?php echo htmlspecialchars($degree); ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="clients" value="<?php echo htmlspecialchars($clients); ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" name="dateofdraw" value="<?php echo htmlspecialchars($dateofdraw); ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="link" value="<?php echo htmlspecialchars($link); ?>">
                        </div>


                        <div class="input-group">
                            <input class="input--style-1" type="text" name="status" value="<?php echo htmlspecialchars($status); ?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" name="prizes" value="<?php echo htmlspecialchars($prizes); ?>">
                        </div>
                      
                        <input type="hidden" name="id" id="textField" value="<?php echo $id; ?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
