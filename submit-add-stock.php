<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$stock_id = uniqid(true);
$date_time = strtotime("now");
// $date_time = strtotime('2023-02-22 00:00');
$add_remove = "A";
$stock_date = date('Y-m-d', $date_time);


$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$sql1 = "SELECT * FROM products WHERE product_id='$product_id'";
$result1 = mysqli_query($con, $sql1);
if(mysqli_num_rows($result1)>0){
    $row1 = mysqli_fetch_assoc($result1);
    $seller_id = $row1['seller_id'];
    $total_quantity = $row1['quantity'];
    $new_quantity = $total_quantity + $quantity;
    
}

$sql3 = "UPDATE products SET quantity=$new_quantity WHERE product_id='$product_id' ";
$result3 = mysqli_query($con, $sql3);

$sql4 = "INSERT INTO stock_log (stock_id, product_id, seller_id, quantity, add_remove, date_time, stock_date ) VALUES ('$stock_id', '$product_id', '$seller_id', $quantity, '$add_remove', $date_time, '$stock_date')";
$result4 = mysqli_query($con, $sql4);

$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);
?>
            