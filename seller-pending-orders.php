<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO | Pending Orders";

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
                <table class="table">        
                    <tbody>
                <?php
                $sql = "SELECT * FROM orders WHERE seller_id='$user_id' AND order_status = 'P'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $product_id = $row['product_id'];
                        $order_id = $row['order_id'];
                        $customer_id = orderTotalDetailsFromOrderId($order_id,'customer_id');
                        $order_no = orderTotalDetailsFromOrderId($order_id,'order_no');
                        $quantity = $row['quantity'];
                        $dp = dpImgFromProductId($product_id);
                        $product_name = productNameFromProductId($product_id);
                        $date_time = date('d/m/Y', $row["date_time"]);
                        $sql1 = "SELECT * FROM products WHERE product_id='$product_id'";
                        $result1 = mysqli_query($con, $sql1);
                        if(mysqli_num_rows($result1)>0){
                            $row = mysqli_fetch_assoc($result1);
                            $mrp = $row['mrp'];
                            $discount = $row['discount'];
                            $sp = $mrp-($mrp *($discount/100));
                        }
                    
                        ?>
                        <tr class="cart-item-<?php echo $product_id;?>">
                            <td class="cart-img"><img src="img/products/<?php echo $dp;?>" alt=""></td>
                            <td class="cart-product-name">
                                <p><a href="product-details.php?id=<?php echo $product_id;?>"><?php echo $product_name;?></a></p>
                                <p>Order Date <?php echo $date_time;?></p>
                                <p>Quantity <?php echo $quantity;?></p>
                                
                                <?php 
                                    $sql2 = "SELECT * FROM address WHERE user_id='$customer_id'";
                                    $result2 = mysqli_query($con, $sql2);
                                    if(mysqli_num_rows($result2)>0){
                                        $flag = 1;
                                        $row2 = mysqli_fetch_assoc($result2);
                                        $building_name = $row2["building_name"];
                                        $street = $row2["street"];
                                        $landmark = $row2["landmark"];
                                        $zip = $row2["zip"];
                                        $state_id = $row2["state_id"];
                                        $district_id = $row2["district_id"];
                                        $state_name = stateNameFromStateId($state_id);
                                        $district_name = districtNameFromDistrictId($district_id);
                                        $customer_name = usernameFromUserid($customer_id);
                                        echo '<h4> Customer Address Is : </h4>';
                                        echo '<p class="cart-address">'.$customer_name.'</p>';
                                        echo '<p class="cart-address">'.$building_name.'</p>';
                                        echo '<p class="cart-address">'.$street.'</p>';
                                        echo '<p class="cart-address">Near '.$landmark.'</p>';
                                        echo '<p class="cart-address">'.$district_name.' , '.$state_name.' - '.$zip.'</p>';

                                    }
                                ?>
                                <a href="javascript:void(0)" onclick="acceptOrder(<?php echo '\''.$order_id.'\',\''.$product_id.'\'';?>)" class="btn btn-success">Accept Order</a>
                            </td>
                            <td class="cart-sp"><?php  echo '₹'.($sp*$quantity);?></td>
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
<script src="js/seller-pending-orders.js"></script>
</body>
</html>
<?php
mysqli_close($con);
?>