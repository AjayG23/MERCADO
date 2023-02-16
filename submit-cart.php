<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$order_id = uniqid(true);
// $date_time = strtotime("now");
$date_time = strtotime('2023-01-24 12:00');
$total_amount = 0;
$sql = "SELECT * FROM cart WHERE user_id='$user_id'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result))
    {
        $product_id = $row['product_id'];
        $product_name = productNameFromProductId($product_id);
        $quantity = $row['quantity'];
        $sql1 = "SELECT * FROM products WHERE product_id='$product_id'";
        $result1 = mysqli_query($con, $sql1);
        if(mysqli_num_rows($result1)>0){
            $row1 = mysqli_fetch_assoc($result1);
            $mrp = $row1['mrp'];
            $discount = $row1['discount'];
            $seller_id = $row1['seller_id'];
            $seller_name = ucwords(sellerNameFromSellerId($seller_id));
            $unit_no = unitDetailsFromUserId($seller_id,'unit_no');
            $unit_name = unitDetailsFromUserId($seller_id,'unit_name');
            $sp = round($mrp-($mrp *($discount/100)),2);
            $tax = $row1['tax_slab'];
            $rate = round($sp - ($sp*($tax/100)),2);
            $tax_amount = ($sp-$rate)*$quantity;
            $amount = $rate*$quantity;
            $net_amount=$amount+$tax_amount;
            $total_amount+=$net_amount;
            $total_quantity = $row1['quantity'];
            $new_quantity = $total_quantity - $quantity;
            $purchase_date = date('Y-m-d', $date_time);
            $category_id = $row1['category_id'];
        }
      $sql2 = "INSERT INTO orders (order_id, product_id, product_name,category_id, seller_id, unit_no, unit_name, quantity, mrp, tax, rate, amount, discount, tax_amount, net_amount, date_time, purchase_date) VALUES ('$order_id', '$product_id', '$product_name','$category_id','$seller_id', $unit_no, '$unit_name', $quantity, $mrp, $tax, $rate, $amount, $discount, $tax_amount, $net_amount, $date_time, '$purchase_date')";
      $result2 = mysqli_query($con, $sql2); 

      $sql3 = "UPDATE products SET quantity=$new_quantity WHERE product_id='$product_id' ";
      $result3 = mysqli_query($con, $sql3);
     
    }
    $sql5 = "SELECT * FROM order_total ORDER BY order_no DESC LIMIT 1";
    $result5 = mysqli_query($con, $sql5);
    if(mysqli_num_rows($result5)>0){
        $row5 = mysqli_fetch_assoc($result5);
        $order_no = $row5['order_no'];
        $order_no++;
    }else{
        $order_no = 10000;
    }

    $sql3="INSERT INTO order_total (order_id, customer_id,order_no, total_amount, payment_status,transaction_no,date_time ) VALUES('$order_id', '$user_id',$order_no, $total_amount, 'Y', '12345678912345', $date_time)";
    $result3 = mysqli_query($con, $sql3);
    $sql4 = "DELETE FROM cart WHERE user_id='$user_id'";
    $result4 = mysqli_query($con, $sql4);

}

            
$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);

            ?>
            