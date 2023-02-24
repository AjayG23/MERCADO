<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$start_date = $_GET['start_date'];    
$end_date = $_GET['end_date'];
$page_title = 'Sales Report From '.date('d-M-Y',strtotime($start_date)).' To '.date('d-M-Y',strtotime($end_date));
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body onload="window.print()">
    <section id="home">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <h4><center>Sales Report From <?php echo date('d-M-Y',strtotime($start_date)).' To '.date('d-M-Y',strtotime($end_date));?></center></h4>
                <table class="table mt-4" id="sales-table">
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
                            $total_amt = 0;
                            
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
                                    $total_amt+=$net_amount;
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
                    <h4>Total Amount : <?php echo $total_amt;?></h4>
                </div>
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script>
    setTimeout(function() { window.location.replace("admin-total-sales.php?start_date=<?php echo $start_date;?>&end_date=<?php echo $end_date;?>"); }, 5000);
</script>
</body>
</html>
<?php
mysqli_close($con);
?>