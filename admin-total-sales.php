<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|Sales Report";
if(isset($_GET['start_date'])){
    $start_date = $_GET['start_date'];    
    $end_date = $_GET['end_date'];
    $flag = 1;
}else{
    $flag = 0;    
    $start_date = 0;    
    $end_date = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <form class="form-sales-data">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="date" class="form-control" name="start_date" value="<?php echo $start_date;?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="date" class="form-control" name="end_date" value="<?php echo $end_date;?>" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="stock-button">Submit</button>
                    </form>
                </div>
                <?php if($flag == 1){ ?>
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
                            $total_amt = 0;
                            $sql1 = "SELECT * FROM orders WHERE purchase_date BETWEEN '$start_date' AND '$end_date' ORDER BY purchase_date";
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
                                    if($dispatched_date=='1970-01-01'){
                                        $dispatched_date = 'NYD';
                                    }
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
                <div class="col-lg-12">
                    <center><a href="admin-print-sales.php?start_date=<?php echo $start_date;?>&end_date=<?php echo $end_date;?>" class="btn btn-success">Print Report</a></center>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script src="js/admin-total-sales.js"></script>
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