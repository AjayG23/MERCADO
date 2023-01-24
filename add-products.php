<?php 
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|Add-Products"; 
?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body>
    <?php include "navbar.php";?>
    <section id="add-products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="seller-products.php">My Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Products</li>

                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12">
                <form action="submit-add-products.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Select Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            <?php 
                            $sql ="SELECT * FROM category"; 
                            $result = mysqli_query($con, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                $category_name = $row['name'];
                                $category_id = $row['category_id'];
                                ?>
                            <option value="<?php echo $category_id; ?>" ><?php echo $category_name; ?> </option>
                            <?php
                            }}
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Product Discription</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Enter discription" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Product Price</label>
                        <input type="text" name="mrp" class="form-control" placeholder="Enter Product Price" required><br>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Product Discount</label>
                        <input type="text" name="discount" class="form-control" placeholder="Enter Product Discount" required><br>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Product Quantity</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Enter Product Quantity" required><br>
                    </div>
                </div>
                

                <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
                </div>
            



        
        </div>
    </section>
<?php include "scripts.php"?>

</body>
</html>
