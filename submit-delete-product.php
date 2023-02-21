<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

        $product_id=$_POST['product_id'];

        $sql = "DELETE FROM products WHERE product_id='$product_id'";
            $result = mysqli_query($con, $sql);

            $sql ="SELECT * FROM product_images WHERE product_id = '$product_id'"; 
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                $img_id = $row['img_id'];
                $name = $row['name'];
            unlink("img/products/".$name);
                }
            }
            $sql = "DELETE FROM product_images WHERE product_id='$product_id'";
            $result = mysqli_query($con, $sql);
            $sql = "DELETE FROM stock_log WHERE product_id='$product_id'";
            $result = mysqli_query($con, $sql);
            
$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);

            ?>