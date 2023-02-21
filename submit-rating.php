<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

      $review_id=uniqid(true);
      $product_id=$_POST['product_id'];
      $user_id = $_SESSION['user_id'];
      $comment = $_POST['comment'];
      $rating = $_POST['rating'];
      $sql = "INSERT INTO review (review_id, product_id, user_id, comment, rating) VALUES ('$review_id', '$product_id', '$user_id', '$comment', $rating)";
      $result = mysqli_query($con, $sql);

            
$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);

            ?>
            