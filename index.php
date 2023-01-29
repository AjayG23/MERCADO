<?php
include "session-start.php";

include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|HOME";

?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="sec-carousel">
        <div class="container-fluid">
            <div class="row">
                <div id="carouselBanner" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselBanner" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselBanner" data-slide-to="1"></li>
                        
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="img/slider/slider-1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="img/slider/slider-2.jpg" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselBanner" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselBanner" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="sec-home">
        <div class="container">
            <div class="row product-row">
                <div class="col-lg-3 product-col">
                    <div class="category-helper-box">
                        <h4>Food Products</h4>
                        <a href="javascript:void(0);" class="btn btn-primary">View More</a>
                        <img src="img/design/index-bg.jpg" alt="">
                    </div>
                </div>
                <?php $sql = "SELECT * FROM products WHERE category_id='163cbc255dc515'";
                        $result = mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $category_id = $row['category_id'];
                                $category_name = categoryNameFromCategoryId($category_id);
                                $product_id = $row['product_id'];
                                $product_name = $row['name'];
                                $out = strlen($product_name) > 60 ? substr($product_name,0,60)."..." : $product_name;
                                $mrp = $row['mrp'];
                                $discount = $row['discount'];
                                //rating also
                                $product_dp = dpImgFromProductId($product_id);
                                $sp = $mrp-($mrp *($discount/100));
                                ?>
                <div class="col-lg-3 product-col">
                    <a href="#">
                        <div class="product-box">
                            <img src="img/products/<?php echo $product_dp;?>" alt="">
                            <p><?php echo $out;?></p>
                            <p><?php echo '<s>Rs '.$mrp.'</s> Rs '.$sp.'('.$discount.'% Discount)';?></p>
                        </div>
                    </a>
                </div>
                <?php }}?>
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
</body>
</html>
<?php
mysqli_close($con);
?>