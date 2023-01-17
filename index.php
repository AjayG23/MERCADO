<?php
include "session-start.php";

include "dbconnect.php";
include "functions.php";
$page_title = "HOME";

if(isset($_SESSION['user_id'])){
    $user_name = usernameFromUserid($_SESSION['user_id']);
    $logged = "Y";
    }

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