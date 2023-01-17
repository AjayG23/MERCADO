<?php
include ('dbconnect.php');
// Assign the input values to variables for easy reference
$user_name = $_POST["user_name"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password = $_POST["password"];
$user_id =  uniqid (true);
$user_type = "C";

$sql = "INSERT INTO users (user_name, mobile ,email ,password ,user_id ,user_type ) VALUES ('$user_name', $mobile, '$email', '$password', '$user_id', '$user_type')";
$result = mysqli_query($con, $sql);

$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);
?>