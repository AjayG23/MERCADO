<?php
function usernameFromUserid($user_id)
{
    include "dbconnect.php";
 
    $sql = "SELECT user_name FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        
        $user_name = $row["user_name"];
    }
    return $user_name ;

}
?>
