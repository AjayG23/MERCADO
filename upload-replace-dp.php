<?php
include "session-start.php";
include "dbconnect.php";

$product_id = $_POST['product_id'];
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
    $dp = "Y";
    $sql = "SELECT * FROM product_images WHERE product_id='$product_id' AND dp='Y'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $img_name = $row["name"];
        $img_id = $row["img_id"];
        unlink("img/products/".$img_name);
            $sql = "DELETE FROM product_images WHERE img_id='$img_id'";
            $result = mysqli_query($con, $sql);
    }
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $img_id = uniqid(true);
    $newfilename = $img_id . '.' . end($temp);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "img/products/" . $newfilename);
    $sql = "INSERT INTO product_images (img_id, product_id, name, dp) VALUES ('$img_id', '$product_id', '$newfilename', '$dp')";
    $result = mysqli_query($con, $sql);

  }
  mysqli_close($con);
  header('Location: seller-product-details.php?id='.$product_id);


?>