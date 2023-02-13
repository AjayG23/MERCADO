<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

      $cart_id=uniqid(true);
      $product_id=$_POST['product_id'];
      $user_id = $_SESSION['user_id'];
      $quantity=1;
      

      $sql = "INSERT INTO cart (cart_id, product_id, user_id, quantity) VALUES ('$cart_id', '$product_id', '$user_id', $quantity)";
      $result = mysqli_query($con, $sql);

            
$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);

            ?>
            