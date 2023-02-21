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
            
<select id="example" onchange="starChange(this.value)">
  <option value="1" >1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>

        </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
<script type="text/javascript">
   $(function() {
      $('#example').barrating({
        theme: 'fontawesome-stars'
      });
   });
   function starChange(star){
    console.log(star);
   }
</script>
</body>
</html>
<?php
mysqli_close($con);
?>