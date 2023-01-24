<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|Verification";

?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                <form class="verification-form">
  <div class="form-row">
    <div class="form-group col-lg-12">
      <label>Enter the verification code sent to your mobile number</label>
      <input type="number" class="form-control" name="otp" placeholder="Enter OTP">
    </div>
    
  </div>
  <div id="otp-response"></div>
  
  <button type="submit" class="btn btn-primary" id="verify-button">Submit</button>



</form>
                </div>
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script src="js/verification.js"></script>
</body>
</html>
<?php
mysqli_close($con);
?>