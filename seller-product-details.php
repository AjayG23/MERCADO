<?php 
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|Product details";
$product_id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="section-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="seller-products.php">My Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Details</a></li>
                             </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row ">
                <div class="col-lg-6">
                    
                </div>
                <div class="col-lg-6">
                    <div class="row float-right" id="confirm-discard">
                        <div class="col-12">Are you Sure?<a href="javascript:void(0);" onclick="confirmDelete('<?php echo $product_id; ?>')" class="btn btn-danger sub-btn confirm-btn">Yes</a><a href="javascript:void(0);" onclick="confirmHide()" class="btn btn-light sub-btn confirm-btn">No</a></div>
                    </div>
                    <a href="javascript:void(0);" id="delete-discard" onclick="confirmShow()" class="btn btn-danger sub-btn float-right">Delete</a>
                </div>
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
                        $category_id = $row['category_id'];
                        $category_name = categoryNameFromCategoryId($category_id);
                    }
                    ?>
                <div class="col-lg-12">
                <form>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" value = "<?php echo $product_name;?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Category</label>
                        <input type="text" name="name" class="form-control" value = "<?php echo $category_name;?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Product Discription</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control" disabled><?php echo $product_description;?> </textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Product Price</label>
                        <input type="text" name="mrp" class="form-control" value = "<?php echo $product_mrp;?>" disabled><br>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Product Discount</label>
                        <input type="text" name="discount" class="form-control" value = "<?php echo $product_discount;?>" disabled><br>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Product Quantity</label>
                        <input type="text" name="quantity" class="form-control" value = "<?php echo $product_quantity;?>" disabled><br>
                    </div>
                </div>
                

                 <a  href='seller-products-update.php?id=<?php echo $product_id;?>' class='btn btn-success'> Update product </a>
                </form>
            </div>
                <div class="col-lg-12">
                <hr>
                    <form class="add-stock">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Add Stock</label>
                            <input type="text" name="quantity" class="form-control">
                            <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary add-stock-btn">Add Stock</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <section id="section-25">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-lg-3">
                    <div class="dp-img-box">
                        <?php 
                                $img_name = dpImgFromProductId($product_id);
                        ?>
                        <img src="img/products/<?php echo $img_name;?>" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="upload-replace-dp.php" method="post" enctype="multipart/form-data">
                        <label for="file-upload" class="seller-image-upload">
                            <i class="fa fa-cloud-upload"></i> <span id="select-text">Select Image</span>
                        </label>
                        <input id="file-upload" type="file" name="fileToUpload" onchange="fileSelected()"required>
                        <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                        <input type="submit" value="Replace DP" name="submit" class="btn btn-success">
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <?php $sql ="SELECT * FROM product_images WHERE product_id='$product_id' AND dp='N'"; 
                            $result = mysqli_query($con, $sql);
                            $count=0;
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $count++;
                                $img_name = $row['name'];
                                $img_id = $row['img_id'];
                                ?>
                <div class="col-lg-3">
                    <div class="ndp-img-box">
                        <img src="img/products/<?php echo $img_name;?>" alt="">
                    </div>
                    <a  href='submit-seller-delete-img.php?id=<?php echo $img_id;?>' class='btn btn-danger'> Delete </a>
                </div>
                <?php }}
                if($count<4){?>
                <div class="col-lg-3">
                <form action="upload-product-images.php" method="post" enctype="multipart/form-data">
                        <label for="ndp-file-upload" class="seller-image-upload-ndp">
                            <img src="img/design/add-img-cross.png" alt="" id="ndp-add-img">
                        </label>
                        <input id="ndp-file-upload" type="file" name="fileToUpload"  onchange="ndpFileSelected()" required>
                        <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                        <input type="submit" value="Upload Image" name="submit" class="btn btn-success">
                    </form>
                </div>
                <?php }?>
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script src="js/seller-product-details.js"></script>

</body>
</html>
<?php
mysqli_close($con);
?>