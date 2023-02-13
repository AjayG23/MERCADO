<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO | CART";

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
                    <input type="hidden" name="user_id" value="<?php echo $user_id;?>" id="user_id">
                <table class="table">        
                    <tbody>
                <?php
                $sql = "SELECT * FROM cart WHERE user_id='$user_id'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $product_id = $row['product_id'];
                        $quantity = $row['quantity'];
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
                                <label for="">Quantity</label>
                                <select class="cart_quantity_<?php echo $product_id;?>" onchange="changeCartQuantity(<?php echo '\''.$product_id.'\'';?>)">
                                <?php 
                                $i = 1;
                                while($i<=10){
                                    ?>
                                    <option value="<?php echo $i;?>"<?php if($i==$quantity){echo 'selected';}?>><?php echo $i;?></option>

                                    <?php
                                    $i++;
                                }
                                ?>
                                    
                                </select>
                                <a href="javascript:void(0)" onclick="deleteCartItem(<?php echo '\''.$product_id.'\'';?>)">Delete</a>
                            </td>
                            <td class="cart-sp"><?php  echo '₹'.$sp;?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                        <tr>
                          <td colspan="3" class="cart-total">SubTotal</td>
                        </tr>
                    </tbody>
                </table>

                </div>
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-address-box">
                    <?php 
                        $flag = 0;
                        $sql = "SELECT * FROM address WHERE user_id='$user_id'";
                        $result = mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)>0){
                            $flag = 1;
                            $row = mysqli_fetch_assoc($result);
                            $building_name = $row["building_name"];
                            $street = $row["street"];
                            $landmark = $row["landmark"];
                            $zip = $row["zip"];
                            $state_id = $row["state_id"];
                            $district_id = $row["district_id"];
                            $state_name = stateNameFromStateId($state_id);
                            $district_name = districtNameFromDistrictId($district_id);
                            echo '<h4>Your Delivering Address Is : </h4>';
                            echo '<p class="cart-address">'.$user_name.'</p>';
                            echo '<p class="cart-address">'.$building_name.'</p>';
                            echo '<p class="cart-address">'.$street.'</p>';
                            echo '<p class="cart-address">Near '.$landmark.'</p>';
                            echo '<p class="cart-address">'.$district_name.' , '.$state_name.' - '.$zip.'</p>';

                        }
                        else{
                            ?>
                            <h4>Please Fill The From Below To Continue With Your Purchase !</h4>
                            <form class="add-address">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="building_name" placeholder="Flat, House no., Building, Company, Apartment " required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="street" placeholder="Area, Street, Sector, Village" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="landmark" placeholder="Landmark" required>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" name="zip" placeholder="Pincode" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="state_id" class="form-control" id="state_id" onchange="populateDistrict(this.value)" required>
                                    <option value="">Select state</option>
                                    

                                    <?php 
                                    $sql ="SELECT * FROM states";
                                    $result = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($result)>0){
                                        while($row = mysqli_fetch_assoc($result)){
                                        $state_name =$row['state_name'];
                                        $state_id =$row['state_id'];
                                    ?>
                                    <option value="<?php echo $state_id; ?>" ><?php echo $state_name; ?> </option>
                                <?php
                                    }}
                                    ?>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                    <select name="district_id" class="form-control" id="district_id" required></select>
                                </div>
                                </div>
                                <div id="signup-response"></div>
                                <button type="submit" class="btn btn-primary add-address-button" >Submit</button>
                            </form>
                            <?php

                        }
                            

                    ?>
                    </div>
                </div>
                <?php if($flag==1){?>
                <div class="col-lg-12">
                    <div class="cart-checkout-box">
                        <a href="#" class="btn btn-primary" onclick="proceedToCheckOut()">Proceed To Checkout</a>  
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <section id="sec-thankyou">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Your Order Has Been Placed Successfully ......</h3>
                    <h3>Thank You!!!</h3>
                    <p>You Will Be Redirected In 3 Seconds......</p>
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