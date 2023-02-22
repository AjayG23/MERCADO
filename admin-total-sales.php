<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|Sales Report";
if(isset($_GET['my'])){
    $my = $_GET['my'];
}else{
    $my = '2023-02';
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
                <div class="col-lg-3 mb-4">
                <label>Month/Year</label>
                    <select onchange="selectMonthYear(this.value)" id="" class="form-control">
                    <option value="2023-02">Select Month/Year</option>
                        <option value="2022-11"<?php if($my=='2022-11')echo "selected";?>>November 2022</option>
                        <option value="2022-12"<?php if($my=='2022-12')echo "selected";?>>December 2022</option>
                        <option value="2023-01"<?php if($my=='2023-01')echo "selected";?>>January 2023</option>
                        <option value="2023-02"<?php if($my=='2023-02')echo "selected";?>>February 2023</option>
                        <!-- <option value="2023-03">March 2023</option> -->
                    </select>
                </div>
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
                            $start_date = date($my.'-01');
                            $end_date = date("Y-m-t", strtotime($start_date));

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
                <div class="col-lg-12">
                    <center><a href="admin-print-sales.php?my=<?php echo $my;?>" class="btn btn-success">Print Report</a></center>
                </div>
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script>
$(document).ready(function(){
    $('#sales-table').dataTable();
});

function selectMonthYear(month_year){
    window.location.replace("admin-total-sales.php?my="+month_year);
}
</script>
</body>
</html>
<?php
mysqli_close($con);
?>