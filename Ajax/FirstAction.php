<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_app";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, email, password FROM Users";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  	$data[] = array("id" => $row["id"], "email" => $row["email"], "password" => $row["password"]);
  }
} else {
  echo "0 results";
}

echo json_encode($data);

$conn->close();
?>