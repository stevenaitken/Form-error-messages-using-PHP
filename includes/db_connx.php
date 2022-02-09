<?php
$servername = "127.0.0.1";
$username = "testUser";
$password = "1234";
$db = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  //die("Connection failed: " . $conn->connect_error);
  header("Location:error/1045.php");
}


?>

