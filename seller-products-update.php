<?php 
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|Update product";
$product_id = $_GET['id']
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="seller-products.php">My Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product update</a></li>
                             </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row ">
                <?php
                    $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result)>0){
                        $row = mysqli_fetch_assoc($result);
                        $product_name = $row['name'];
                        $product_description = $row['description'];
                        $product_mrp = $row['mrp'];
                        $product_discount = $row['discount'];
                        $product_quantity = $row['quantity'];
                        $category_id_now = $row['category_id'];
                    }
                    ?>
                <div class="col-lg-12">
                <form class="seller-products-update">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" value = "<?php echo $product_name;?>" required>
                        <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            <?php 
                            $sql ="SELECT * FROM category"; 
                            $result = mysqli_query($con, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                $category_name = $row['name'];
                                $category_id = $row['category_id'];
                                if($category_id==$category_id_now)
                                {
                                    ?>
                                    <option value="<?php echo $category_id; ?>" selected><?php echo $category_name; ?> </option>
                                    <?php
                                } else{
                                    ?>
                                    <option value="<?php echo $category_id; ?>" ><?php echo $category_name; ?> </option>
                                    <?php
                                }
                                ?>
                            <?php
                            }}
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Product Discription</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"  required><?php echo $product_description;?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Product Price</label>
                        <input type="text" name="mrp" class="form-control" value = "<?php echo $product_mrp;?>" required><br>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Product Discount</label>
                        <input type="text" name="discount" class="form-control" value = "<?php echo $product_discount;?>" required><br>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Product Quantity</label>
                        <input type="text" name="quantity" class="form-control" value = "<?php echo $product_quantity;?>" required><br>
                    </div>
                </div>
                
                <div id="update-response"></div>
                <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
                </div>

            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script src="js/seller-products-update.js"></script>

</body>
</html>
<?php
mysqli_close($con);
?>