<?php
include ('dbconnect.php');
include ('session-start.php');
// Assign the input values to variables for easy reference

$flag_email = 0;
$flag_mobile = 0;

$mobile = $_POST["mobile"];
$email = $_POST["email"];

$sql = "SELECT * FROM users";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result))
{ 
	if($row["email"]==$email)
	{ 	$flag_email=1;
    }

    if($row["mobile"]==$mobile)
	{ 	$flag_mobile=1;
    }
}

if($flag_mobile==0 && $flag_email==0)
{
    $status = "ok";

}
else if($flag_mobile==1 && $flag_email==1)
{
    $status = "E-mail and mobile is already used ";
}
else if($flag_mobile==1)
{
    $status = "mobile already in use";
}
else if($flag_email==1)
{
    $status = "email already in use";
}

$resp_json = array('status' => "$status");
echo json_encode($resp_json);
mysqli_close($con);
?>