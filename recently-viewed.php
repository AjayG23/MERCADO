<?php
      if($logged=='Y'){
        ?>

<section id="sec-home">
    <div class="container">
        <div class="row product-row">
            <div class="col-lg-3 product-col">
                <div class="category-helper-box">
                    <h4>Recently Viewed</h4>
                    <img src="img/design/index-bg.jpg" alt="">
                </div>
            </div>
            <?php $sql = "SELECT * FROM recently_viewed WHERE user_id='$user_id' ORDER BY date_time DESC LIMIT 3";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $product_id = $row['product_id'];
                            $sql1 = "SELECT * FROM products WHERE product_id='$product_id'";
                            $result1 = mysqli_query($con, $sql1);
                        if(mysqli_num_rows($result1)>0){
                            $row1 = mysqli_fetch_assoc($result1);
                            $category_id = $row1['category_id'];
                            $category_name = categoryNameFromCategoryId($category_id);
                            $product_name = $row1['name'];
                            $out = strlen($product_name) > 60 ? substr($product_name,0,60)."..." : $product_name;
                            $mrp = $row1['mrp'];
                            $discount = $row1['discount'];
                            //rating also
                            $product_dp = dpImgFromProductId($product_id);
                            $sp = $mrp-($mrp *($discount/100));
                        }
                            ?>
            <div class="col-lg-3 product-col">
                <a href="product-details.php?id=<?php echo $product_id;?>">
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
<?php }?>