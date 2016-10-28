<?php


?>

<?php

$arr = $_POST["passData"];
$fName = $_POST["fNameval"];
//echo $arr[0];


	$dbhost = 'localhost';
	$dbuser = 'christjuan1104';
	$dbpass = '';
	$dbname = 'soapTest';

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `gustRecipe`(`oID`,`fName`,`coconut`, `palmkernel`, `palm`, `olive`, `sweetAlmond`, `caster`, `avocado`, `macadamiaNut`, `hazelnut`, `sesame`, `cocoaButter`, `sheaButter`, `rosehip`) 
VALUES (null,'".$fName."',".$arr[0].",".$arr[1].",".$arr[2].",".$arr[3].",".$arr[4].",".$arr[5].",".$arr[6].",".$arr[7].",".$arr[8].",".$arr[9].",".$arr[10].",".$arr[11].",".$arr[12].")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>