<?php
include "session-start.php";
include "dbconnect.php";
include "functions.php";
$page_title = "MERCADO|Add address";
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
            <div class="row">
                <div class="col-lg-12">
            <form class="add-address">
                      <div class="form-group">
                        <input type="text" class="form-control" name="building_name" placeholder="Flat, House no., Building, Company, Apartment " required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="street" placeholder="Area, Street, Sector, Village" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="landmark" placeholder="Landmark" required>
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control" name="zip" placeholder="Pincode" required>
                      </div>
                      <div class="form-group">
                      <select name="state_id" class="form-control" required>
                            <option value="">Select state</option>

                            <?php 
                            $sql ="SELECT * FROM states";
                            $result = mysqli_query($con, $sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                $state_name =$row['state_name'];
                                $state_id =$row['state_id'];

                                
                            
                            ?>
                            <option value="<?php echo $state_id; ?>" ><?php echo $state_name; ?> </option>
                        <?php
                            }}
                            ?>
                        </select>
                        </div>
                      <div id="signup-response"></div>
                    <button type="submit" class="btn btn-primary" id="signup-button">Submit</button>
                  </form>
                    </div>  
            </div>
        </div>
    </section>

<?php include "scripts.php"; ?>
</body>
</html>
<?php
mysqli_close($con);
?>