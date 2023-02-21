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
                <div class="col-lg-6">
                    <?php 
                        $i = 0;
                        $graph_1_label='';
                        $graph_1_values='';
                        while($i<=6){
                            $desired_date = date('Y-m-d',strtotime('-'.$i.' days'));
                            // echo 'Today is '.$desired_date.'<br>';
                            $sql = "SELECT SUM(net_amount) AS n_amount, purchase_date FROM orders WHERE seller_id='$user_id' AND purchase_date='$desired_date' GROUP BY purchase_date";
                            $result = mysqli_query($con, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $purchase_date = $row['purchase_date'];
                                    $net_amount = $row['n_amount'];
                                }
                            }else{
                                $net_amount = 0;
                            }
                            $i++;
                            $graph_1_label.='\''.$desired_date.'\',';
                            $graph_1_values.=$net_amount.',';
                        }
                        
                    ?>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    
                </div>
            </div>
            <div class="row">

              <?php //between operator
                $today = date('Y-m-d',strtotime('now'));
                $desired_date_7 = date('Y-m-d',strtotime('-6 days'));
                $desired_date_28 = date('Y-m-d',strtotime('-27 days'));
                $desired_date_365 = date('Y-m-d',strtotime('-364 days'));
                // echo $desired_date_7.' '.$desired_date_28.' '.$desired_date_365.'  '.$today;
                $sql = "SELECT COUNT(order_id) AS count,SUM(net_amount) AS total FROM orders WHERE seller_id='$user_id' AND purchase_date BETWEEN '$desired_date_7' AND '$today'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_assoc($result);
                        $count_7 = $row['count'];
                        $total_7 = $row['total'];
                        // echo '<br>'.$count.'  '.$total;
                }
                $sql = "SELECT COUNT(order_id) AS count,SUM(net_amount) AS total  FROM orders WHERE seller_id='$user_id' AND purchase_date BETWEEN '$desired_date_28' AND '$today'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)>0){
                  $row = mysqli_fetch_assoc($result);
                      $count_28 = $row['count'];
                      $total_28 = $row['total'];
                      // echo '<br>'.$count.'  '.$total;
              }
              $sql = "SELECT COUNT(order_id) AS count,SUM(net_amount) AS total  FROM orders WHERE seller_id='$user_id' AND purchase_date BETWEEN '$desired_date_365' AND '$today'";
              $result = mysqli_query($con, $sql);
              if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                    $count_365 = $row['count'];
                    $total_365 = $row['total'];
                    // echo '<br>'.$count.'  '.$total;
              }
            $sql = "SELECT COUNT(order_id) AS pending_no FROM orders WHERE seller_id='$user_id' AND order_status = 'P' GROUP BY order_status ";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_assoc($result);
                    $pending_no = $row['pending_no'];
                }
              ?>
              <div class="col-lg-3">
                <h1><?php echo $pending_no;?></h1>
                <p>Pending Orders</p>
              </div>
              <div class="col-lg-3">
                <h1><?php echo $count_7;?></h1>
                <p>7 Days</p>
              </div>
              <div class="col-lg-3">
                <h1><?php echo $count_28;?></h1>
                <p>28 Days</p>
              </div>
              <div class="col-lg-3">
                <h1><?php echo $count_365;?></h1>
                <p>1 Year</p>
              </div>
              <div class="col-lg-3"></div>
              <div class="col-lg-3">
                <h1><?php echo $total_7;?></h1>
                <p>7 Days</p>
              </div>
              <div class="col-lg-3">
                <h1><?php echo $total_28;?></h1>
                <p>28 Days</p>
              </div>
              <div class="col-lg-3">
                <h1><?php echo $total_365;?></h1>
                <p>1 Year</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
              <table class="table">        
                <tbody>
                <?php
                //most sold items
                $sql = "SELECT SUM(quantity) AS total_quantity, product_id  FROM orders WHERE seller_id='$user_id' GROUP BY product_id ORDER BY SUM(quantity) DESC LIMIT 3";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)>0){
                  while($row = mysqli_fetch_assoc($result)){
                    $total = $row['total_quantity'];
                    $product_id = $row['product_id'];
                    $dp = dpImgFromProductId($product_id);
                    $product_name = productNameFromProductId($product_id);
                    ?>
                    <tr class="cart-item-<?php echo $product_id;?>">
                            <td class="cart-img"><img src="img/products/<?php echo $dp;?>" alt=""></td>
                            <td class="cart-product-name">
                                <p><a href="seller-product-details.php?id=<?php echo $product_id;?>"><?php echo $product_name;?></a></p>
                                <p>Ordered <?php echo $total;?> Times</p>
                            </td>
                        </tr>
                    <?php
                    // echo '<br>  '.$total.'  '.$product_id;
                  }
                }
              ?>
                </tbody>
              </table>
              </div>
              <div class="col-lg-6">
              <div class="graph2-doughnut-box">
                        <?php
                            $graph_2_label='';
                            $graph_2_values='';
                            $sql = "SELECT COUNT(category_id) AS count_cat,SUM(quantity) AS total_quantity, category_id FROM orders WHERE seller_id='$user_id' GROUP BY category_id";
                            $result = mysqli_query($con, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $category_id = $row['category_id'];
                                    $count_cat = $row['count_cat'];
                                    $total_quantity = $row['total_quantity'];
                                    $graph_2_label.='\''.categoryNameFromCategoryId($category_id).'\',';
                                    $graph_2_values.=$total_quantity.',';
                                }
                            }

                        ?>
                        <canvas id="myDonutChart"></canvas>
                    </div>
              </div>
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php echo $graph_1_label;?>],
      datasets: [{
        label: 'Sales Amount',
        data: [<?php echo $graph_1_values;?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  const ctx2 = document.getElementById('myDonutChart');
  new Chart(ctx2, {
    type: 'doughnut',
    data: {
  labels: [<?php echo $graph_2_label;?>],
  datasets: [{
    label: 'No of Orders  ',
    data: [<?php echo $graph_2_values;?>],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(235, 105, 102)',

    ],
    hoverOffset: 4
  }]
}
  });
  
</script>
</body>
</html>
<?php
mysqli_close($con);
?>