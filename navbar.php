<?php if($user_type=="C"){?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top"  >
  <a class="navbar-brand" href="index.php"><img src="https://static-assets-web.flixcart.com/fk-p-linchpin-web/fk-cp-zion/img/flipkart-plus_8d85f4.png" alt="" id="icon" style="height:20px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      
      <li class="nav-item">
      <?php
      if($logged=='Y'){
        ?>
         <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart
        <?php
        $sql = "SELECT * FROM cart WHERE user_id='$user_id'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0){
            $i = mysqli_num_rows($result);
            echo ' [ '.$i.' ] ';
        }
        ?></a>
        <?php
      }else{
        ?>
          <a class="nav-link" href="login.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
        <?php
      }?>
       
      </li>
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width:500px !important ">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
      
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      
      <a class="nav-link mr-5" href="seller-signup.php">Become A Seller</a>
    </li>
          <?php if($logged!="Y")
          {?>
         <li class="nav-item active">
            <a class="btn btn-primary" href="login.php" role="button">Login</a>
        </li> 
          <?php } else{?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $user_name; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">My Account</a>
          <a class="dropdown-item" href="wishlist.php">My Wishlist</a>
          <a class="dropdown-item" href="my-orders.php">My Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
      <?php }?>

    </ul>
  </div>
</nav>
<?php }
 //seller navbar
else if($user_type=="S"){?>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top"  >
  <a class="navbar-brand" href="seller-home.php"><img src="https://static-assets-web.flixcart.com/fk-p-linchpin-web/fk-cp-zion/img/flipkart-plus_8d85f4.png" alt="" id="icon" style="height:20px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      

      <li>
      <a class="nav-link" href="seller-products.php"><i class="fa-solid fa-cart-shopping"></i>My Products</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Orders
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="seller-pending-orders.php">Pending Orders</a>
          <a class="dropdown-item" href="seller-processed-orders.php">Processed Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      
      
      
    </ul>
  
      
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      
      <a class="nav-link mr-5" href="#">Statistics</a>
    </li>
          <?php if($logged!="Y")
          {?>
         <li class="nav-item active">
            <a class="btn btn-primary" href="login.php" role="button">Login</a>
        </li> 
          <?php } else{?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $user_name; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">My Account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
      <?php }?>

    </ul>
  </div>
</nav>
<?php }?>
