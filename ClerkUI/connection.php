<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=pharmalogue", $username, $password);
  
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "";

} catch(PDOException $e) {

  echo "Connection failed: " . $e->getMessage();
  
}
?>


<!-- $conn = new mysqli('localhost', 'root', '', 'pharmalogue');

if($conn->connect_error){
  die("Connection failed".$conn->connect_error);
}
echo "Connected successfuly"; -->
