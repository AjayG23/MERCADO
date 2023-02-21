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
    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <table class="table" id="sales-table">
                        <thead>
                            <th>S No</th>
                            <th>Order No</th>
                            <th>Product Name</th>
                            <th>Customer Name</th>
                            <th>Seller Name</th>
                            <th>Qty</th>
                            <th>Net Amt</th>
                            <th>Purchase Date</th>
                            <th>Dispatch Date</th>
                        </thead>
                        <tbody>
                        <?php
                            $s_no = 1;
                            $d = "2023-02";
                            $start_date = date($d.'-01');
                            $end_date = date($d.'-t');
                            $sql1 = "SELECT * FROM orders WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
                            $result1 = mysqli_query($con, $sql1);
                            if(mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1))
                                {
                                    
                                    $order_no = orderTotalDetailsFromOrderId($row['order_id'],'order_no');
                                    $product_name = $row['product_name'];
                                    $customer_name = usernameFromUserid(orderTotalDetailsFromOrderId($row['order_id'],'customer_id'));
                                    $seller_name = ucwords(unitDetailsFromUserId($row['seller_id'],'unit_name'));
                                    $quantity = $row['quantity'];
                                    $net_amount = $row['net_amount'];
                                    $purchase_date = $row['purchase_date'];
                                    $dispatched_date = date('Y-m-d',$row['dispatched_date_time']);

                                    ?>
                                    <tr>
                                        <td><?php echo $s_no;?></td>
                                        <td><?php echo $order_no;?></td>
                                        <td><?php echo $product_name;?></td>
                                        <td><?php echo $customer_name;?></td>
                                        <td><?php echo $seller_name;?></td>
                                        <td><?php echo $quantity;?></td>
                                        <td><?php echo $net_amount;?></td>
                                        <td><?php echo $purchase_date;?></td>
                                        <td><?php echo $dispatched_date;?></td>
                                    </tr>
                                    <?php
                                    $s_no++;
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
<script>
$(document).ready(function(){
    $('#sales-table').dataTable();
});
</script>
</body>
</html>
<?php
mysqli_close($con);
?>