<?php
$host = "localhost";
$userName = "root";
$password = "";
$database = "mercado";
$con = mysqli_connect($host, $userName, $password, $database);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>