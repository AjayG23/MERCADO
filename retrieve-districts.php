<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";

$state_id = $_POST['state_id'];
$sql = "SELECT * FROM district WHERE state_id='$state_id'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result))
    {
        $district_id = $row['district_id'];
        $district_name = $row['district_name'];
        echo '<option value="'.$district_id.'" >'.$district_name.'</option>';
    }
}

  
            
// $resp_json = array('status' => "ok");
// echo json_encode($resp_json);
mysqli_close($con);

?>
            