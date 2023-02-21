<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

      $review_id = $_POST['review_id'];
      $comment = $_POST['comment'];
      $rating = $_POST['rating'];
      $sql = "UPDATE review SET comment='$comment', rating=$rating WHERE review_id='$review_id'";
      $result = mysqli_query($con, $sql);

            
$resp_json = array('status' => "ok");
echo json_encode($resp_json);
mysqli_close($con);

            ?>
            