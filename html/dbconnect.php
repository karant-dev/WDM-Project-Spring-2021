<?php
$servername = "localhost";
$username = "root";
$password = "pwdpwd";
$database = "ImmigrantsPortal";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "<script>window.alert('Connected to db successfully')</script>";
?>
