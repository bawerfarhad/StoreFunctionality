<!-- <?php
  $uname="root";
  $dbpass="";
  $host="localhost";
  $db="bahsstore";
  $conn= mysqli_connect("$host","$uname","$dbpass","$db");

  if ($conn){
    echo "work properly". "<br>";
  }else {
    echo "not work";
  }
?> -->


<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>
