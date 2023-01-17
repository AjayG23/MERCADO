<?php
include "dbconnect.php";
$page_title = "MERCADO | SELLER-SIGNUP";
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="login">
        <div class="container">
            <div class="row login-row">
                
                
            <div class="col-lg-6 login-left signup-form ">
                  <h3>SIGN UP FORM</h3>
                <form class="login-form signup-details">
                      <div class="form-group">
                        <input type="text" class="form-control" name="user_name" placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control"  name="unit_name" placeholder="Enter Unit Name">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control" name="mobile" placeholder="Mobile Number">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="password">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="c_password" placeholder=" Retype password">
                      </div>
                      
                    <button type="submit" class="btn btn-primary" id="signup-button">Submit</button>
                  </form>
                </div>
                
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script src="js/seller-signup.js"></script>
</body>
</html>
<?php
mysqli_close($con);
?>