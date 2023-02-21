<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
include "universal-codes.php";
$page_title = "MERCADO|Admin";

?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="sec-admin-home">
        <div class="container">

        </div>
    </section>
    <section id="sec-stats">

    </section>
<?php include "scripts.php"; ?>
</body>
</html>
<?php
mysqli_close($con);
?>