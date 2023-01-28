<?php 
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
include "user-auth.php";
$page_title = "MERCADO|Products";?>

<!DOCTYPE html>
<html lang="en">

<?php  include "head.php"?>
<body>
<?php include "navbar.php"?>

    <section id="products-page">
        <div class="container">
            <div class="row row-products">
                <div class="col-lg-12"><h2>PRODUCTS SECTION</h2></div>
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><a href="seller-products.php">My Products</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12"><a href="add-products.php" class="btn btn-success float-right">Add Product</a></div>
            </div>
            <div class="row row-tables">
                <div class="col-lg-12">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                            <th scope="col">no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <!-- <th scope="col">Discription</th> -->
                            <th scope="col">price</th>
                            <th scope="col">discount</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">image</th>
                            <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql1 = "SELECT * FROM products WHERE seller_id='$user_id'";
                        $result1 = mysqli_query($con, $sql1);
                        if(mysqli_num_rows($result1)>0){
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result1))
                            {
                                $category_id = $row['category_id'];
                                $category_name = categoryNameFromCategoryId($category_id);
                                
                                    echo "<tr>";
                                    echo "<td>".$i++."</td>";
                                    echo "<td>".$row["name"]."</td>";
                                    echo "<td>".$category_name."</td>";
                                    // echo "<td>".$row["description"]."</td>";
                                    echo "<td>".$row["mrp"]."</td>";
                                    echo "<td>".$row["discount"]."</td>";
                                    echo "<td>".$row["quantity"]."</td>";

                                    echo "<td>img</td>";
                                
                                    echo "<td>";
                                    echo "<a  href='seller-product-details.php?id=" .$row['product_id'] ."' class='btn btn-success'> Show More </a>";
                                    // echo "<a  href='delete-products.php?id=" .$row['product_id'] ."'class='btn btn-primary'> Delete</a>";
                                    echo "</td>";
                                    echo "</tr>";
                            }
                        }
                        mysqli_close($con);
                        ?>
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>
    </section>
    <?php include "scripts.php";?>
    <script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</body>
</html>