<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

        $name=$_POST['product_name'];
        $category_id=$_POST['category_id'];
        $description=$_POST['description'];
        $mrp=$_POST['mrp'];
        $discount=$_POST['discount'];
        $quantity = $_POST['quantity'];
        $product_id=$_POST['product_id'];

        $sql = "UPDATE products SET name='$name', category_id='$category_id', description='$description', mrp=$mrp, discount=$discount, quantity=$quantity WHERE product_id='$product_id' ";
              $result = mysqli_query($con, $sql);

            
$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);

            ?>