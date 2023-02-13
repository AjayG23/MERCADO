<?php
include ('session-start.php');
include ('dbconnect.php');
include "functions.php";
include ('universal-codes.php');
// Assign the input values to variables for easy reference
$building_name = $_POST["building_name"];
$street = $_POST["street"];
$landmark = $_POST["landmark"];
$zip = $_POST["zip"];
$state_id = $_POST["state_id"];
$district_id = $_POST["district_id"];
$address_id = uniqid(true);

$sql = "INSERT INTO address (address_id, user_id, building_name, street,landmark, district_id, state_id, zip ) VALUES ('$address_id', '$user_id', '$building_name', '$street', '$landmark', '$district_id', '$state_id', '$zip')";
$result = mysqli_query($con, $sql);



$resp_json = array('status' => "success");
echo json_encode($resp_json);
mysqli_close($con);
?>