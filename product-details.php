<?php
include "dbconnect.php";
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

$product_id = $_GET['id'];


//recently viewed code
if($logged=='Y'){
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
                            $overall_rating_main=computeOverallRating($product_id);
                            $overall_rating = round($overall_rating_main);
                            $sp = $mrp-($mrp *($discount/100));}
                    ?>
                        <h3><?php echo $product_name;?></h3>
                        <p><span class="span-sp"><?php echo '₹'.$sp;?></span><span class="span-mrp"><s><?php echo '₹'.$mrp;?></s></span><span class="span-disc"><?php echo $discount.'% Off';?></span></p>
                        <p>Inclusive of all taxes</p>
                        <?php if($overall_rating_main!=0){?>
                            <p>
                            <select id="overall-rating" readonly>
                                <option value="1"<?php if($overall_rating==1){echo 'selected';}?>>1</option>
                                <option value="2"<?php if($overall_rating==2){echo 'selected';}?>>2</option>
                                <option value="3"<?php if($overall_rating==3){echo 'selected';}?>>3</option>
                                <option value="4"<?php if($overall_rating==4){echo 'selected';}?>>4</option>
                                <option value="5"<?php if($overall_rating==5){echo 'selected';}?>>5</option>
                            </select>
                            </p>
                        <?php }?>
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
    <section id="sec-rating">
        <div class="container">
            <div class="row row-rating-form">
                <div class="col-lg-12">
                    <h3>Reviews</h3>
                </div>
                <?php if($logged=='Y'){?>
                <div class="col-lg-12">
                <?php $product_id = $_GET['id'];
                     $sql = "SELECT * FROM review WHERE product_id='$product_id' AND user_id = '$user_id'";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result)>0){
                        $row = mysqli_fetch_assoc($result);
                        $review_id = $row['review_id'];
                        $comment = $row['comment'];
                        $rating = $row['rating'];
                ?>
                <form class="update-rating">
                    <div class="form-group">
                        <label for="">Modify Your Review</label>
                        <textarea name="rating_comment" id="" cols="30" rows="5" required><?php echo $comment;?></textarea>
                        <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                        <input type="hidden" name="review_id" value="<?php echo $review_id;?>">
                    </div>
                    <div class="form-group">
                        <select id="form-rating" name="form_rating">
                            <option value="1"<?php if($rating==1){echo 'selected';}?>>1</option>
                            <option value="2"<?php if($rating==2){echo 'selected';}?>>2</option>
                            <option value="3"<?php if($rating==3){echo 'selected';}?>>3</option>
                            <option value="4"<?php if($rating==4){echo 'selected';}?>>4</option>
                            <option value="5"<?php if($rating==5){echo 'selected';}?>>5</option>
                        </select>
                    </div>
                    <div id="rating-response"></div>
                    <button type="submit" class="btn btn-success" id="update-rating-button">Update Rating</button>
                  </form>
                  <?php }else{
                                $flag = 0;
                                $sql = "SELECT order_id FROM orders WHERE product_id='$product_id'";
                                $result = mysqli_query($con, $sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $order_id = $row['order_id'];
                                        $sql1 = "SELECT customer_id FROM order_total WHERE order_id='$order_id' AND customer_id='$user_id'";
                                        $result1 = mysqli_query($con, $sql1);
                                        if(mysqli_num_rows($result1)>0){
                                            $flag = 1;
                                        }
                                    }

                                }
                                if($flag==1){

                    ?>
                <form class="add-rating">
                    <div class="form-group">
                        <label for="">Write A Review</label>
                        <textarea name="rating_comment" id="" cols="30" rows="5" required></textarea>
                        <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                    </div>
                    <div class="form-group">
                        <select id="form-rating" name="form_rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div id="rating-response"></div>
                    <button type="submit" class="btn btn-primary" id="rating-button">Submit Rating</button>
                  </form>
                  <?php }}?>
                </div>
                <?php }?>
                <div class="col-lg-12 mt-4">
                    <table class="table" id="review-table">
                        <thead>
                            <th>Customer Name</th>
                            <th>Review</th>
                            <th>Rating</th>
                        </thead>
                        <tbody>
                        <?php
                            if($logged=='Y'){
                                $sql1 = "SELECT * FROM review WHERE product_id='$product_id' AND user_id != '$user_id'";
                            }else{
                                $sql1 = "SELECT * FROM review WHERE product_id='$product_id'";
                            }
                            $result1 = mysqli_query($con, $sql1);
                            if(mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1))
                                {
                                    $review_user_id = $row['user_id'];
                                    $comment = $row['comment'];
                                    $rating = $row['rating'];
                                    $review_user_name = usernameFromUserid($review_user_id);
                                    ?>
                                    <tr>
                                        <td><?php echo $review_user_name;?></td>
                                        <td><?php echo $comment;?></td>
                                        <td>
                                        <select class="user-rating" name="form_rating">
                                            <option value="1"<?php if($rating==1){echo 'selected';}?>>1</option>
                                            <option value="2"<?php if($rating==2){echo 'selected';}?>>2</option>
                                            <option value="3"<?php if($rating==3){echo 'selected';}?>>3</option>
                                            <option value="4"<?php if($rating==4){echo 'selected';}?>>4</option>
                                            <option value="5"<?php if($rating==5){echo 'selected';}?>>5</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>

<?php include "scripts.php"; ?>
<script src="js/product-details.js"></script>
<script type="text/javascript">
   $(function() {
      $('#form-rating').barrating({
        theme: 'fontawesome-stars',

      });
      $('#overall-rating').barrating({
        theme: 'fontawesome-stars',
        readonly: true,
        showSelectedRating:true
      });
      $('.user-rating').barrating({
        theme: 'fontawesome-stars',
        readonly: true
      });
   });
</script>
<script>
$(document).ready(function(){
    $('#review-table').dataTable();
});
</script>
</body>
</html>
<?php
mysqli_close($con);
?>