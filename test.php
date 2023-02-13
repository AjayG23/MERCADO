<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
 $sql5 = "SELECT * FROM order_total ORDER BY order_no DESC LIMIT 1";
 $result5 = mysqli_query($con, $sql5);
 if(mysqli_num_rows($result5)>0){
     $row5 = mysqli_fetch_assoc($result5);
     $order_no = $row5['order_no'];
     $order_no++;
     echo "if worked!";
 }else{
     $order_no = 10000;
     echo "else worked!";
 }
echo $order_no;

?>