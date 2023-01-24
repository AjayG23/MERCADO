<?php
include "dbconnect.php";
?>

<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="delete from products where product_id='$id'";
    $result=mysqli_query($con,$sql);

    if($result)
    {
        header('location:seller-products.php');
    }
    else
    {
        echo " err";
    }
}
?>