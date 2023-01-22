<?php
include "dbconnect.php";
?>


<?php
           $product_name=$_POST['product-name'];
      $product_category=$_POST['product-category'];
        $product_discription=$_POST['product-discription'];
        $product_price=$_POST['product-price'];
        $product_discount=$_POST['product-discount'];
        $product_id=uniqid (true);

        $cat = "SELECT category_id FROM category where name='$product_category'";
        $result = mysqli_query($con, $cat);
        $value = mysqli_fetch_assoc($result);

        $category_id = $value['category_id'];

    

     $sql = "INSERT INTO products (product_id, seller_id, category_id, name, description, mrp, discount) VALUES ('$product_id', 'abc', '$category_id', '$product_name', '$product_discription', '$product_price', '$product_discount')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                header('Location: seller-products.php');

              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

            ?>