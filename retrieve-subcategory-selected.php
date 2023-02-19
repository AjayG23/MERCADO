<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

$parent_id = $_POST['parent_id'];
$category_id_now = $_POST['category_id_now'];
$sql = "SELECT * FROM category WHERE parent_id='$parent_id'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result))
    {
        $category_id = $row['category_id'];
        $name = $row['name'];
        if($category_id==$category_id_now){
            echo '<option value="'.$parent_id.'" selected>'.$name.'</option>';
        }else{
            echo '<option value="'.$parent_id.'" >'.$name.'</option>';
        }
    }
}

  
            
// $resp_json = array('status' => "ok");
// echo json_encode($resp_json);
mysqli_close($con);

?>
            