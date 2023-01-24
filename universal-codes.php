<?php
$logged = "N";
$user_type = "C";
if(isset($_SESSION['user_id'])){

    $user_name = usernameFromUserid($_SESSION['user_id']);
    $user_type = $_SESSION["user_type"];
    $user_id = $_SESSION["user_id"];
    $logged = "Y";
    }

?>