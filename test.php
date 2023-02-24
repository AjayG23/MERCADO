<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
//  $sql5 = "SELECT * FROM orders";
//  $result5 = mysqli_query($con, $sql5);
//  if(mysqli_num_rows($result5)>0){
//     while($row5 = mysqli_fetch_assoc($result5)){
//         $purchase_date = date('Y-m-d', $row5["date_time"]);
//         $order_id = $row5['order_id'];
//         $sql = "UPDATE orders SET purchase_date='$purchase_date' WHERE order_id = '$order_id'";
//         $result = mysqli_query($con, $sql);

//     }
//  }
// $start_date = strtotime('2023-02-21 12:00');
// echo $start_date;
// $d = "2022-02";
// echo date($d.'-01');
// echo date('2022-m-t');

?>