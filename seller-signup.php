<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
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
            <div class="col-lg-6 login-left signup-text">
                    <img src="img/design/man_jump.jpg" alt="">
                    <p id="signup-content">Get Access To Your Orders <br>
                                           Wishlists And Recomendations</p>
                   <p>sign up to sell</p>
                </div>
                
            <div class="col-lg-6 login-left signup-form  ">
                  <h3 class="header-hide">SIGN UP FORM</h3>
                <form class="login-form signup-details">
                      <div class="form-group">
                        <input type="text" class="form-control" name="user_name" placeholder="Enter Name" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control"  name="unit_name" placeholder="Enter Unit Name" required>
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control" name="mobile" placeholder="Mobile Number" required>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="password" required>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="c_password" placeholder=" Retype password" required>
                      </div>
                      <div id="signup-response"></div>

                    <button type="submit" class="btn btn-primary" id="signup-button">Submit</button>

                  </form>
                  <p id="thankyou-response"></p>
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