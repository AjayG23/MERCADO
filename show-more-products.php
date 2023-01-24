<?php 
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|ShowMore";
$id = $_GET['id']
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="home">
        <div class="container">
        <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="seller-products.php">My Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Show More</a></li>
                             </ol>
                    </nav>
                </div>
        </div>
        <div class="container show-more">
            <div class="row ">
            <?php
                        $sql1 = "SELECT * FROM products WHERE product_id = '$id'";
                        $result1 = mysqli_query($con, $sql1);
                        if(mysqli_num_rows($result1)>0){
                            $i = 1;
                            $row = mysqli_fetch_assoc($result1);
                            $category_id = $row['category_id'];
                            $category_name = categoryNameFromCategoryId($category_id);
                        }
                        ?>
                <div class="col-lg-4 product-left">
                    <img src="img/design/man_jump.jpg" alt="">
                    <?php echo "<h2>".$row['name']."</h2>";
                    echo "<h3>".$row['mrp']."</h3><p>".$row['discount']."%</p>";?>
                    
                    <h2>space for rating </h2>
                </div>
                <div class="col-lg-8 product-right">
                    <div class="row description-row">
                        <div class="col-lg-12 m-5">
                        <?php echo "<h3>".$row['description']."</h3>";?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 ml-5">
                            <?php echo "<h3>Quantity  :  ".$row['quantity']."</h3>";?>
                        </div>
                        <div class="col-lg-6 m-5">
                            <?php echo "<h3>Product ID  :  ".$row['product_id']."</h3>";?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- button stopped here -->
                </div>
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
</body>
</html>
<?php
mysqli_close($con);
?>