<?php
$servername = "localhost";
$username = "pratiksha";
$password = "pass";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, mobile, address, email FROM employee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo "name: " . $row["name"]. " - Name: " . $row["email"]. " email:" . $row["email"]. "<br>";
   echo "mobile: " . $row["mobile"]. " - mobile: " . $row["address"]. " -address:" . $row["address"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>