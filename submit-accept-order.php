<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

$product_id = $_POST['product_id'];
$order_id = $_POST['order_id'];
$dispatched_date_time = strtotime("now");
$sql = "UPDATE orders SET order_status='A', dispatched_date_time=$dispatched_date_time WHERE product_id='$product_id' AND order_id='$order_id' ";
$result = mysqli_query($con, $sql);           
$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);
?>
             