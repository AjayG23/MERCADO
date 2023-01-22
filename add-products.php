<?php include "dbconnect.php";?>
<!DOCTYPE html>
<html lang="en">
<?php $page_title = "MERCADO|Add-Products"; 
include "head.php"?>
<body>
    <?php //include "navbar.php";?>
<section id="add-products">
    <div class="container">
        <div class="row">
            <form action="add-products-helper.php" method="post" >
                <input type="text" name="product-name" class="form-control" placeholder="Enter Product Name" required> <br>

                <select name="product-category" class="form-control" required>
    <option value="">Select Category</option>

    <?php 
    $sql ="SELECT name FROM category";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
        $option =$row['name'];
        
        
      
    ?>
    <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
   <?php
    }}
    ?>
</select>
                        
                        <br>
                
                <textarea name="product-discription" id="" cols="30" rows="10" class="form-control" placeholder="Enter discription" required></textarea>
                <br>
                <input type="text" name="product-price" class="form-control" placeholder="Enter Product Price" required><br>
                <input type="text" name="product-discount" class="form-control" placeholder="Enter Product Discount" required><br>
                <input type="file" name="product-image" id="" class="form-control">

                <button type="submit" class="form-control mt-4  btn btn-success">submit</button>
            </form>

        </div>
    </div>
</section>
   <?php include "scripts.php"?>
</body>
</html>