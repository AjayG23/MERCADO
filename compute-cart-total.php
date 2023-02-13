<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

      $user_id = $_POST['user_id'];
      $total = 0;
      $sql = "SELECT * FROM cart WHERE user_id='$user_id'";
      $result = mysqli_query($con, $sql);
      if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result))
          {
              $product_id = $row['product_id'];
              $quantity = $row['quantity'];
              $stock = stockFromProductId($product_id);
              $sql1 = "SELECT * FROM products WHERE product_id='$product_id'";
              $result1 = mysqli_query($con, $sql1);
              if(mysqli_num_rows($result1)>0){
                  $row = mysqli_fetch_assoc($result1);
                  $mrp = $row['mrp'];
                  $discount = $row['discount'];
                  $sp = $mrp-($mrp *($discount/100));
                  $total += ($sp*$quantity);
              }
            }
      }
      $total = round($total,2);

  
            
$resp_json = array('status' => "ok",'total' => $total);
echo json_encode($resp_json);
mysqli_close($con);

            ?>
            