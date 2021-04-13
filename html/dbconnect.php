<?php
$servername = "localhost";
$username = "root";
$password = "pwdpwd";
$database = "immigrantsportal";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// $servername = "localhost";
// $username = "kxt2000_Abhijeet";
// $password = "Abhijeet@123";
// $database = "kxt2000_ImmigrantsPortal";

// Create connection
// $conn = new mysqli($servername, $username, $password, $database);

// Check connection
// if ($conn->connect_error) {
  // die("Connection failed: " . $conn->connect_error);
// }

?>
