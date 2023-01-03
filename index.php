<?php
include "dbconnect.php";
$page_title = "HOME";
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "navbar.php";?>
    <section id="home">
        <div class="container">

        </div>
    </section>

<?php include "scripts.php"; ?>
</body>
</html>
<?php
mysqli_close($con);
?>