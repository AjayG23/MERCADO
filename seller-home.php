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
                                while($row = mysqli_fetch_assoc($result))
                                {
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
                    <div>
                        <?php
                            $graph_2_label='';
                            $graph_2_values='';
                            $sql = "SELECT COUNT(category_id) AS count_cat, category_id FROM orders WHERE seller_id='$user_id' GROUP BY category_id";
                            $result = mysqli_query($con, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $category_id = $row['category_id'];
                                    $count_cat = $row['count_cat'];
                                    $graph_2_label.='\''.categoryNameFromCategoryId($category_id).'\',';
                                    $graph_2_values.=$count_cat.',';
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
    label: 'My First Dataset',
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