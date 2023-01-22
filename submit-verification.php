<?php
include "session-start.php";
include ('dbconnect.php');
// Assign the input values to variables for easy reference

$otp = $_POST["otp"];
$user_id = $_SESSION["user_id"];


$sql = "SELECT * FROM verification WHERE user_id = '$user_id'";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result))
{ 
    $db_otp = $row["otp"];
    $attempt = $row["attempt"];
	if($otp==$db_otp){ 	
        $status = "success";
        $sql2 = "UPDATE users SET verified='Y' WHERE user_id='$user_id' ";
        $result2 = mysqli_query($con, $sql2);
	}else{
        $attempt++;
        $remain_attempt = 3-$attempt;
        $sql2 = "UPDATE verification SET attempt=$attempt WHERE user_id='$user_id' ";
        $result2 = mysqli_query($con, $sql2);
        $status = 'OTP Mismatch. You have '.$remain_attempt.' attempts left';	
     }
} 
	


$resp_json = array('status' => "$status", 'attempt' => $attempt);
echo json_encode($resp_json);
mysqli_close($con);
?>