<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

      $wishlist_id=uniqid(true);
      $product_id=$_POST['product_id'];
      $user_id = $_SESSION['user_id'];
      

      $sql = "INSERT INTO wishlist (wishlist_id, product_id, user_id) VALUES ('$wishlist_id', '$product_id', '$user_id')";
      $result = mysqli_query($con, $sql);

            
$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);

            ?>
            