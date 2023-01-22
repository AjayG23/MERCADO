
    


<?php
// $member_id = uniqid (true);
// echo $member_id;
// echo "<br>";
// $member_id = uniqid (true);
// echo $member_id;
include "dbconnect.php";
$district_id = uniqid (true);
$state_name = "Kasargod";

$sql = "INSERT INTO district (district_id, state_id, district_name) VALUES ('$district_id','163cc171bae085', '$state_name')";
$result = mysqli_query($con, $sql);

//echo "hello";

            
                        
                    // $sql = "SELECT name FROM category";
                    // $result = mysqli_query($con, $sql);
                    // if(mysqli_num_rows($result)>0){
    
                    // while($row = mysqli_fetch_assoc($result))
                    //      {          
                    //           echo $row["name"]."<br>";
                            
                                    

                    //      } }
                           ?>

