<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|HOME";
if(isset($_GET['start_date'])){
    $start_date = $_GET['start_date'];    
    $end_date = $_GET['end_date'];
    $seller_id = $_GET['seller_id'];
    $flag = 1;
}else{
    $flag = 0;    
    $start_date = 0;    
    $end_date = 0;
    $seller_id = "NA";
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
                <div class="col-lg-12">
                    <form class="form-stock-data">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="date" class="form-control" name="start_date" value="<?php echo $start_date;?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="date" class="form-control" name="end_date" value="<?php echo $end_date;?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <select name="seller_id" class="form-control" required>
                                    <option value="NA" <?php if($seller_id=="NA"){echo "selected";}?>>Select seller</option>

                                    <?php 
                                    $sql ="SELECT * FROM users WHERE user_type='S'";
                                    $result = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($result)>0){
                                        while($row = mysqli_fetch_assoc($result)){
                                        $user_name =$row['user_name'];
                                        $user_id =$row['user_id'];
                                        $unit_name = unitDetailsFromUserId($user_id,'unit_name');
                                    ?>
                                    <option value="<?php echo $user_id;?>" <?php if($seller_id==$user_id){echo "selected";}?>><?php echo $unit_name; ?> </option>
                                <?php
                                    }}
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="stock-button">Submit</button>
                    </form>
                </div>
                <?php if($flag==1){ ?>
                <div class="col-lg-12">
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
                <div class="col-lg-12">
                    <center><a href="admin-print-stock.php?start_date=<?php echo $start_date;?>&end_date=<?php echo $end_date;?>&seller_id=<?php echo $seller_id;?>" class="btn btn-success">Print Report</a></center>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php include "scripts.php"; ?>
<script src="js/admin-total-stock.js"></script>
</body>
</html>
<?php
mysqli_close($con);
?>