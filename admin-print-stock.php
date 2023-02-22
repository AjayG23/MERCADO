<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$start_date = $_GET['start_date'];    
$end_date = $_GET['end_date'];
$seller_id = $_GET['seller_id'];
$seller_name = ucwords(unitDetailsFromUserId($seller_id,'unit_name'));
$page_title = 'Stock Log Of '.$seller_name.' from '.date('d-M-Y',strtotime($start_date)).' To '.date('d-M-Y',strtotime($end_date));
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body onload="window.print()">
    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <h4><center>Stock Log of <?php echo $seller_name.' from '.date('d-M-Y',strtotime($start_date)).' To '.date('d-M-Y',strtotime($end_date));?></center></h4>
                <table class="table mt-4" id="sales-table">
                        <thead>
                            <th>S No</th>
                            <th width="50%">Product Name</th>
                            <th>Stock Log</th>
                            <th>Stock On Date</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                        <?php
                            $s_no = 1;
                            $sql = "SELECT * FROM stock_log WHERE seller_id='$seller_id' AND stock_date BETWEEN '$start_date' AND '$end_date' ORDER BY stock_date";
                            $result = mysqli_query($con, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $product_name =  productNameFromProductId($row['product_id']);
                                    $quantity = $row['quantity'];
                                    $add_remove = $row['add_remove'];
                                    if($add_remove=='A'){
                                        $stock_log = 'Added '.$quantity.' to stock';
                                    }else{
                                        $stock_log = 'Sold '.$quantity.' quantity';
                                    }
                                    $stock_date = date('d-m-Y',strtotime($row['stock_date']));
                                    $stock_on_date = stockOnDate($row['product_id'],$row['stock_date']);
                                    ?>
                                    <tr>
                                        <td><?php echo $s_no;?></td>
                                        <td><?php echo $product_name;?></td>
                                        <td><?php echo $stock_log;?></td>
                                        <td><?php echo $stock_on_date;?></td>
                                        <td><?php echo $stock_date;?></td>
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
    setTimeout(function() { window.location.replace("admin-total-stock.php?start_date=<?php echo $start_date;?>&end_date=<?php echo $end_date;?>&seller_id=<?php echo $seller_id;?>"); }, 5000);
</script>
</body>
</html>
<?php
mysqli_close($con);
?>