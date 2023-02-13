<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
$seller_id = $_SESSION['user_id'];
        $name=$_POST['name'];
        $category_id=$_POST['category_id'];
        $description=$_POST['description']; 
        $mrp=$_POST['mrp'];
        $discount=$_POST['discount'];
        $quantity = $_POST['quantity'];
        $tax_slab = $_POST['tax_slab'];
        $product_id=uniqid (true);
        $dp = "Y";

$uploadOk = 1;
$target_file = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
  }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $img_id = uniqid(true);
    $newfilename = $img_id . '.' . end($temp);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "img/products/" . $newfilename);
    $sql = "INSERT INTO product_images (img_id, product_id, name, dp) VALUES ('$img_id', '$product_id', '$newfilename', '$dp')";
    $result = mysqli_query($con, $sql);
    $sql = "INSERT INTO products (product_id, seller_id, category_id, name, description,quantity, mrp, discount, tax_slab) VALUES ('$product_id', '$seller_id', '$category_id', '$name', '$description',$quantity, $mrp, $discount, $tax_slab)";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    header('Location: seller-products.php');
  }
      ?>