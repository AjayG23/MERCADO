<?php include "dbconnect.php";
$page_title = "MERCADO|Products";?>

<!DOCTYPE html>
<html lang="en">

<?php  include "head.php"?>
<body>
<?php include "navbar.php"?>

    <section id="products-page">
        <div class="container">
            <div class="row row-products">
                <h2>PRODUCTS SECTION</h2>
            </div>
            <a href="add-products.php" class="btn btn-success float-right">Add Product</a>
            <div class="row row-tables">
            <table class="table">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Discription</th>
      <th scope="col">price</th>
      <th scope="col">discount</th>
      <th scope="col">image</th>
      <th scope="col">Options</th>
     </tr>
  </thead>
  <tbody>


<?php
             $sql1 = "SELECT * FROM products";
            $result1 = mysqli_query($con, $sql1);

             
         

            if(mysqli_num_rows($result1)>0){
                $i = 1;
                while($row = mysqli_fetch_assoc($result1))
                {
                    
                    $find_cat = $row['category_id'];
                  $category = "SELECT name FROM category WHERE category_id = '$find_cat'";
                  $catt =  mysqli_query($con, $category);
                  $cattt = mysqli_fetch_assoc($catt);
                  $final_category = $cattt['name'];
                   
                    echo "<tr>";
                    echo "<td>".$i++."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$final_category."</td>";
                    echo "<td>".$row["description"]."</td>";
                    echo "<td>".$row["mrp"]."</td>";
                    echo "<td>".$row["discount"]."</td>";
                    echo "<td>img</td>";
                   
                    echo "<td>";
                    echo "<a  href='edit-products.php?id=" .$row['name'] ."'> Update </a>";
                    echo "<a  href='delete-products.php?id=" .$row['name'] ."'> Delete</a>";

                   echo " </tr>";
                    
                }
                echo "</table>
                </center>";

            }
           

            mysqli_close($con);




?>
</tbody>
        </table>
            </div>
        </div>
    </section>
</body>
</html>