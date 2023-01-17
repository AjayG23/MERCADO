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
            $status = "success";		
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