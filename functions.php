<?php
function usernameFromUserid($user_id)
{
    include "dbconnect.php";
 
    $sql = "SELECT user_name FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        
        $user_name = $row["user_name"];
    }
    return $user_name ;

}

function categoryNameFromCategoryId($category_id)
{
    include "dbconnect.php";
 
    $sql = "SELECT name FROM category WHERE category_id='$category_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        
        $category_name = $row["name"];
    }
    return $category_name ;
}

function dpImgFromProductId($product_id)
{
    include "dbconnect.php";
 
    $sql = "SELECT name FROM product_images WHERE product_id='$product_id' AND dp='Y'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        
        $img_name = $row["name"];
    }
    return $img_name ;
}

function productNameFromProductId($product_id)
{
    include "dbconnect.php";
 
    $sql = "SELECT name FROM products WHERE product_id='$product_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        
        $product_name = $row["name"];
    }
    return $product_name ;
}
function sellerNameFromSellerId($seller_id)
{
    include "dbconnect.php";
 
    $sql = "SELECT user_name FROM users WHERE user_id='$seller_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        
        $seller_name = $row["user_name"];
    }
    return $seller_name ;
}

function checkInCart($product_id,$user_id){
    $is_in_cart = 0;
    include "dbconnect.php";
    $sql = "SELECT * FROM cart WHERE user_id='$user_id' AND product_id='$product_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
       $is_in_cart = 1;

    }
    return $is_in_cart ;   
}

function checkInWishlist($product_id,$user_id){
    $is_in_wishlist = 0;
    include "dbconnect.php";
    $sql = "SELECT * FROM wishlist WHERE user_id='$user_id' AND product_id='$product_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
       $is_in_wishlist = 1;

    }
    return $is_in_wishlist ;   
}

function stockFromProductId($product_id){
    include "dbconnect.php";
    $sql = "SELECT quantity FROM products WHERE product_id='$product_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $quantity = $row["quantity"];
    }
    return $quantity ;
}

function stateNameFromStateId($state_id){
    include "dbconnect.php";
    $sql = "SELECT state_name FROM states WHERE state_id='$state_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $state_name = $row["state_name"];
    }
    return $state_name ;
}
function districtNameFromDistrictId($district_id){
    include "dbconnect.php";
    $sql = "SELECT district_name FROM district WHERE district_id='$district_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $district_name = $row["district_name"];
    }
    return $district_name ;
}

function unitDetailsFromUserId($user_id,$col_name){
    include "dbconnect.php";
    $sql = "SELECT $col_name FROM unit_details WHERE user_id='$user_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $col_value = $row["$col_name"];
    }
    return $col_value ;
}

function orderTotalDetailsFromOrderId($order_id,$col_name){
    include "dbconnect.php";
    $sql = "SELECT $col_name FROM order_total WHERE order_id='$order_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $col_value = $row["$col_name"];
    }
    return $col_value ;
}


function computeOverallRating($product_id){
    include "dbconnect.php";
    $avg_rating = 0;
    $sql = "SELECT AVG(rating) AS avg_rating FROM review WHERE product_id='$product_id'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $avg_rating = $row["avg_rating"];
    }
    return $avg_rating ;

}
?>
