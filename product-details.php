<?php
include "dbconnect.php";
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

$product_id = $_GET['id'];


//recently viewed code
$sql = "SELECT * FROM recently_viewed WHERE product_id='$product_id' AND user_id='$user_id'";
$result = mysqli_query($con, $sql);
$date_time = strtotime("now");
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $recent_id = $row['recent_id'];
    $sql1 = "UPDATE recently_viewed SET date_time=$date_time WHERE recent_id='$recent_id'";
    $result1 = mysqli_query($con, $sql1); 
}else{
    $recent_id = uniqid(true);
    $sql2 = "INSERT INTO recently_viewed (recent_id, product_id, user_id, date_time) VALUES ('$recent_id', '$product_id', '$user_id', $date_time)";
    $result2 = mysqli_query($con, $sql2); 
}

$product_name = productNameFromProductId($product_id);
$page_title = 'MERCADO|'.$product_name; 
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body id="body-bg-color">
    <?php include "navbar.php";?>
    <section id="sec-product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-img-box">
                    <div id="carouselProduct" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php $product_dp = dpImgFromProductId($product_id);?>
                        <img class="d-block w-100" src="img/products/<?php echo $product_dp;?>" alt="First slide">
                        </div>
                        <?php $sql = "SELECT * FROM product_images WHERE product_id='$product_id'AND dp='N'";
                        $result = mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $name = $row['name']; ?>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="img/products/<?php echo $name;?>" alt="Second slide">
                        </div>
                        <?php }}?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselProduct" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselProduct" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-desc-box">
                    <?php $sql = "SELECT * FROM products WHERE product_id='$product_id'";
                        $result = mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)>0){
                            $row = mysqli_fetch_assoc($result);
                            $category_id = $row['category_id'];
                            $category_name = categoryNameFromCategoryId($category_id);
                            $mrp = $row['mrp'];
                            $discount = $row['discount'];
                            $seller_id = $row['seller_id'];
                            $description = $row['description'];
                            //rating also
                            $sp = $mrp-($mrp *($discount/100));}
                    ?>
                        <h3><?php echo $product_name;?></h3>
                        <p><span class="span-sp"><?php echo '₹'.$sp;?></span><span class="span-mrp"><s><?php echo '₹'.$mrp;?></s></span><span class="span-disc"><?php echo $discount.'% Off';?></span></p>
                        <p>Inclusive of all taxes</p>
                        <?php  $seller_name = ucwords(unitDetailsFromUserId($seller_id,'unit_name'));?>
                        <table class="table" id="product-details-table">
                            <tbody>
                                <tr>
                                    <td class="td-left">Category</td>
                                    <td class="td-right"><?php echo ucwords($category_name);?></td>
                                </tr>
                                <tr>
                                    <td class="td-left">Seller</td>
                                    <td class="td-right"><?php echo ucwords($seller_name);?></td>
                                </tr>
                                <tr>
                                    <td class="td-left">Description</td>
                                    <td class="td-right"><?php echo $description;?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php 
                        if($logged=='Y'){
                            $is_in_cart = checkInCart($product_id,$user_id);
                            if($is_in_cart==0){ 
                            ?>
                            <a href="#" class="btn btn-primary" onclick="addToCart(<?php echo '\''.$product_id.'\'';?>)" ><i class="fa-solid fa-cart-shopping"></i> Add To Cart</a>
                            <?php    
                            }else{
                            ?> 
                            <a href="cart.php" class="btn btn-primary"  ><i class="fa-solid fa-cart-shopping"></i> Go To Cart</a>
                            <?php
                            }
                            
                            $is_in_wishlist = checkInWishlist($product_id,$user_id);
                            if($is_in_wishlist==0){ 
                            ?>
                            <a href="#" class="btn btn-secondary"onclick="addToWishlist(<?php echo '\''.$product_id.'\'';?>)"><i class="fa-solid fa-cart-shopping"></i> Add To Wishlist</a>
                            <?php    
                            }else{
                            ?> 
                            <a href="wishlist.php" class="btn btn-secondary"  ><i class="fa-solid fa-cart-shopping"></i> Go To Wishlist</a>
                            <?php
                            }
                        }else{
                            ?>
                                <a href="login.php" class="btn btn-primary" ><i class="fa-solid fa-cart-shopping"></i> Go To Cart</a>
                                <a href="login.php" class="btn btn-secondary"  ><i class="fa-solid fa-cart-shopping"></i> Go To Wishlist</a>

                            <?php

                        }
                        ?>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script src="js/product-details.js"></script>
</body>
</html>
<?php
mysqli_close($con);
?>