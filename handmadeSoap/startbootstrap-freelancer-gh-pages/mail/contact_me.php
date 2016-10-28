<?php

$name = $_POST['name'];
$email_address =$_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

	$dbhost = 'localhost';
	$dbuser = 'christjuan1104';
	$dbpass = '';
	$dbname = 'contactInfo';

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `contactInfo`(`fID`,`fName`, `fEmail`, `fPhone`, `fMessage`) 
VALUES (null,".$name.",".$email_address.",".$phone.",".$message.")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	




?>
