<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

  $seller_id = $_SESSION['user_id'];
        $name=$_POST['name'];
        $category_id=$_POST['category_id'];
        $description=$_POST['description'];
        $mrp=$_POST['mrp'];
        $discount=$_POST['discount'];
        $quantity = $_POST['quantity'];
        $product_id=uniqid (true);

     $sql = "INSERT INTO products (product_id, seller_id, category_id, name, description,quantity, mrp, discount) VALUES ('$product_id', '$seller_id', '$category_id', '$name', '$description',$quantity, $mrp, $discount)";
            $result = mysqli_query($con, $sql);

            if ($result) {
                header('Location: seller-products.php');

              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

            ?>