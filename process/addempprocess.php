<?php
require_once ('dbh.php');
$firstname = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$location = $_POST['location']; // new variable

$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$clients = $_POST['clients'];
$link = $_POST['link'];
$click_count = $_POST['click_count'];

$files = $_FILES['file'];
$filename = $files['name'];
$fileerror = $files['error'];
$filetemp = $files['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png', 'jpg', 'jpeg');

if (in_array($filecheck, $fileextstored)) {
    $destinationfile = 'images/'. $filename;
    move_uploaded_file($filetemp, $destinationfile);

    $sql = "INSERT INTO `employee`(`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `pic`, `clients`, `link`, `click_count`, `location`) 
        VALUES ('', '$firstname', '$lastName', '$email', '1234', '$birthday', '$gender', '$contact', '$destinationfile', '$clients', '$link', '$click_count', '$location')";
    $result = mysqli_query($conn, $sql);
    $last_id = $conn->insert_id;

    if ($result == 1) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Successfully Registered')
        window.location.href='..//viewemp.php';
        </SCRIPT>");
    } else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Failed to Register')
        window.location.href='javascript:history.go(-1)';
        </SCRIPT>");
    }
} else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid file type')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>