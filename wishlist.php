<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO | Wishlist";

?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="sec-cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Wishlist</h3>
                    <input type="hidden" name="user_id" value="<?php echo $user_id;?>" id="user_id">
                <table class="table">        
                    <tbody>
                <?php
                $sql = "SELECT * FROM wishlist WHERE user_id='$user_id'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $product_id = $row['product_id'];
                        $dp = dpImgFromProductId($product_id);
                        $product_name = productNameFromProductId($product_id);
                        $stock = stockFromProductId($product_id);
                        $sql1 = "SELECT * FROM products WHERE product_id='$product_id'";
                        $result1 = mysqli_query($con, $sql1);
                        if(mysqli_num_rows($result1)>0){
                            $row = mysqli_fetch_assoc($result1);
                            $mrp = $row['mrp'];
                            $discount = $row['discount'];
                            $seller_id = $row['seller_id'];
                            

                            $seller_name = ucwords(unitDetailsFromUserId($seller_id,'unit_name'));
                            $sp = $mrp-($mrp *($discount/100));
                        }
                    
                        ?>
                        <tr class="cart-item-<?php echo $product_id;?>">
                            <td class="cart-img"><img src="img/products/<?php echo $dp;?>" alt=""></td>
                            <td class="cart-product-name">
                                <p><a href="product-details.php?id=<?php echo $product_id;?>"><?php echo $product_name;?></a></p>
                                <p>Stock <?php echo $stock;?></p>
                                <p>Sold By <?php echo $seller_name;?></p>
                                <a href="javascript:void(0)" onclick="deleteWishlistItem(<?php echo '\''.$product_id.'\'';?>)">Delete</a>
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
<script src="js/cart.js"></script>
</body>
</html>
<?php
mysqli_close($con);
?>