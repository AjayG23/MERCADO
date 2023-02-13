<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

        $product_id=$_POST['product_id'];

        $sql = "DELETE FROM cart WHERE product_id='$product_id' AND user_id='$user_id'";
            $result = mysqli_query($con, $sql);

            $sql ="SELECT name FROM products WHERE product_id = '$product_id'"; 
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                }
            
$resp_json = array('status' => "ok",'product_name'=>"$name");
echo json_encode($resp_json);
mysqli_close($con);

            ?>