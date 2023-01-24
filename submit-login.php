<?php
include "session-start.php";
include ('dbconnect.php');
// Assign the input values to variables for easy reference

$email = $_POST["email"];
$password = $_POST["password"];
$flag=0;


$sql = "SELECT * FROM users";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result))
{ 
	if($row["email"]==$email)
	{ 	$flag=1;
		if($row["password"]==$password)
        {	$flag=2;
            
            $_SESSION["user_id"]=$row["user_id"];
            $_SESSION["user_type"]=$row["user_type"];
			$verified=$row["verified"];
			if($verified=="N")
			{
				$otp = random_int(100000, 999999);
				$date_time = strtotime("now");
				$user_id = $row["user_id"];
                 
				$sql2 ="SELECT * FROM verification WHERE user_id = '$user_id'";
				$result2 = mysqli_query($con, $sql2);
				if(mysqli_num_rows($result2)>0){
					$row2 = mysqli_fetch_assoc($result2);
					$db_date_time = $row2["date_time"];
					$time_diff = $date_time-$db_date_time;
					if($time_diff>60)
					{
						$sql3 = "UPDATE verification SET otp = $otp, date_time = $date_time WHERE user_id='$user_id' ";
       					$result3 = mysqli_query($con, $sql3);
					}
				}else{
					$sql3 = "INSERT INTO verification (user_id, otp, date_time) VALUES ('$user_id', $otp, $date_time)";
					$result3 = mysqli_query($con, $sql3);
				}
                                

				

				$status = "verify";
				
			}
			else{
            $status = "success";	
			}
		} 
	}
}
if($flag==0)
$status =  "Username and Password is Wrong";

if($flag==1)
$status=  "Wrong Password";

$resp_json = array('status' => "$status");
echo json_encode($resp_json);
mysqli_close($con);
?>