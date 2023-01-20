<?php
include ('dbconnect.php');
include ('session-start.php');
// Assign the input values to variables for easy reference
$user_name = $_POST["user_name"];
$unit_name = $_POST["unit_name"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password = $_POST["password"];
$user_id =  uniqid (true);
$user_type = "S";
$created =  strtotime("now");

$sql = "INSERT INTO users (user_name, mobile, email, password, user_id, user_type, created ) VALUES ('$user_name', $mobile, '$email', '$password', '$user_id', '$user_type', $created)";
$result = mysqli_query($con, $sql);

$sql = "INSERT INTO unit_details (user_id, unit_name ) VALUES ('$user_id','$unit_name')";
$result = mysqli_query($con, $sql);

$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);
?>