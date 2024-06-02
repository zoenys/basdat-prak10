<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pbd_zoen";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT coah_no, coach_name FROM Tabel2_Coaches";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Nama: " . $row["coach_name"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>
