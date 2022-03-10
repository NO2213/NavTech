<?php
$servername = "localhost";
$username   = "navtech_employee";
$password   = "Appv65&2";
$dbname     = "navtech_employee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


function ea($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}
?>