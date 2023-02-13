<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$sql = "UPDATE cart SET quantity=$quantity WHERE product_id='$product_id' AND user_id='$user_id' ";
$result = mysqli_query($con, $sql);           
$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);
?>
             