<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

$img_id = $_GET['id'];

            $sql ="SELECT * FROM product_images WHERE img_id = '$img_id'"; 
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $img_id = $row['img_id'];
                $name = $row['name'];
                $product_id = $row['product_id'];
            unlink("img/products/".$name);
                }
            
            $sql = "DELETE FROM product_images WHERE img_id='$img_id'";
            $result = mysqli_query($con, $sql);
            
$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);
header('Location: seller-product-details.php?id='.$product_id);

            ?>