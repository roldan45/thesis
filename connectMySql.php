<?php
$servername = "localhost"; 
$username_server = "root";
$password_server = "";
$db = "skill2";
$conn = mysqli_connect($servername, $username_server, $password_server,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>