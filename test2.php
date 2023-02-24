<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|HOME";

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
            
            
            </div>
           </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


</body>
</html>
<?php
mysqli_close($con);
?>