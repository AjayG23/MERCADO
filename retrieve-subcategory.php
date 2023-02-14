<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

$category_id = $_POST['category_id'];
$sql = "SELECT * FROM category WHERE parent_id='$category_id'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result))
    {
        $category_id = $row['category_id'];
        $name = $row['name'];
        echo '<option value="'.$category_id.'" >'.$name.'</option>';
    }
}

  
            
// $resp_json = array('status' => "ok");
// echo json_encode($resp_json);
mysqli_close($con);

?>
            