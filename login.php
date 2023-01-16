<?php
include "dbconnect.php";
$page_title = "MERCADO | LOGIN";
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
                    <p>Get Access To Your Orders <br>
                    Wishlists And Recomendations</p>
                    <a class="btn btn-primary" href="#" onclick="showSignForm()" role="button" >SIGN UP</a>
                </div>
                <div class="col-lg-6 login-left signup-form ">
                  <h3>SIGN UP FORM</h3>
                <form class="login-form">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Unit Name">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control"  placeholder="Email">
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control"  placeholder="Mobile Number">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control"  placeholder="password">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control"  placeholder=" Retype password">
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                <div class="col-lg-6 login-right">
                  <img src="https://static-assets-web.flixcart.com/fk-p-linchpin-web/fk-cp-zion/img/flipkart-plus_8d85f4.png" alt="">
                  <form class="login-form">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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