<?php
include "session-start.php";
include "dbconnect.php";
include "universal-codes.php";

$page_title = "MERCADO | LOGIN";

?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php";
include "universal-codes.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="login">
        <div class="container">
            <div class="row login-row">
                <div class="col-lg-6 login-left signup-text">
                    <img src="img/design/man_jump.jpg" alt="">
                    <p id="signup-content">Get Access To Your Orders <br>
                                           Wishlists And Recomendations</p>
                    <a class="btn btn-primary" href="#" onclick="showSignForm()" role="button" id="sign-button" >SIGN UP</a>
                </div>
                
                <div class="col-lg-6 login-left signup-form ">
                  <h3>SIGN UP FORM</h3>
                <form class="signup-details">
                      <div class="form-group">
                        <input type="text" class="form-control" name="user_name" placeholder="Enter Name" required>
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
                </div>
                <div class="col-lg-6 login-right">
                  <img src="https://static-assets-web.flixcart.com/fk-p-linchpin-web/fk-cp-zion/img/flipkart-plus_8d85f4.png" alt="">
                  <form class="login-form">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control"  name ="email" placeholder="Enter email" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                      </div>
                      <p id="login-response"></p>
                    <button type="submit" class="btn btn-primary" id="login-button">Login</button>
                  </form>
                  </div>
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script src="js/login.js"></script>
</body>
</html>
<?php
mysqli_close($con);
?>