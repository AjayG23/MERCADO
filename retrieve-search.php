<?php
include ('session-start.php');
include ('dbconnect.php');
include('functions.php');
// Assign the input values to variables for easy reference

$search_string = '%'.$_POST["search_word"].'%';
$sql = "SELECT * FROM products WHERE name LIKE '$search_string' LIMIT 5";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $product_id = $row["product_id"];
    $product_name = $row["name"];
    echo '<a href=""><li>'.$product_name.'</li></a>';
    }
}
mysqli_close($con);
?>