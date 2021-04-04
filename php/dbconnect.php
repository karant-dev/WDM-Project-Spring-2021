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
echo "Connected successfully\n";

$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["user_id"]. " - Name: " . $row["f_name"]. " " . $row["l_name"]. " is from " . $conn->query('SELECT name FROM countries WHERE country_id = ' . int($row["country_id"]))."\n";
  }
} else {
  echo "0 results";
}

$conn->close();
?>
