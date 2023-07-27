<?php 

session_start();
include('server/connection.php');

if(!isset($_SESSION['logged_in'])){
  header('location: login.php' );
  exit();
}

if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header("location: login.php");
    exit();
  }
}

if(isset($_POST['change_password'])){

        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $user_email = $_SESSION['user_email'];

        //if pwassword dont match
        if($password !== $confirmPassword){
          header('location: account.php?error=password do not match, please try again');
        }

        //if password is less than 6 char
        else if(strlen($password) < 6 ){
          header('location: account.php?error=password must be at least 6 characters');
        }else{

          $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
          $stmt->bind_param('ss', md5($password),$user_email);
          if($stmt->execute()){
            header('location: account.php?message=password has been updated succesfully');
          }else{
            header('location: account.php?message=could not update password');
          }
        }
  
}


//get orders
if(isset($_SESSION['logged_in'])){

  
  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=?");
  
  $stmt->bind_param('i', $user_id);

  $stmt->execute();
  
  $orders = $stmt->get_result();//array


}

?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GIVON</title>
    <!-- css bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- js bootstrop link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/6812750bea.js" crossorigin="anonymous"></script>
    
</head>
<!-- body -->
<body class="account-body">
      <!-- header -->

    <!-- nav bar -->
        <!-- first nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">G I V O N</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about-us.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link social" href="#"><i class="fa-brands fa-facebook"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link social" href="#"><i class="fa-brands fa-twitter"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link social" href="#"><i class="fa-brands fa-instagram"></i></a>
        </li>
        <li class="nav-item-dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="shop.php">Shirts</a></li>
            <li><a class="dropdown-item" href="shop-hoodie.php">Hoodies</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="shop-tote.php">Tote Bags</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link account-button" href="account.php"><i class="fa-solid fa-user"></i></i> Account</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link shopping-button" href="cart.php"><i class="fa-solid fa-bag-shopping"></i> Shopping Bag</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>
    
	<!--Account-->
	<section id="account-profile" class="my-5 py-5">
    <div class="row container mx-auto">
      <?php if(isset($_GET['payment_message'])){?> 
        <p class="mt-5 text-center" style="color:green"><?php echo $_GET['payment_message'];?></p>
      <?php } ?> 
      <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
      <p style="color: green;"><?php if(isset($_GET['register_success'])) echo $_GET['register_success'];?></p>
      <p style="color: green;"><?php if(isset($_GET['login_success'])) echo $_GET['login_success'];?></p>
        <h2 class="font-weight-bold">Account Info</h2>
        <hr class="mx-auto">
        <div class="account-info">
          <p>Name: <span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?></span></p>
          <p>Email: <span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}?></span></p>
          <p><a href="#orders" id="orders-btn">Your Orders</a></p>
          <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
        </div>
      </div>

      <div class="col-lg-6 col-md-12 col-sm-12">
        <form id="account-form" method="POST" action="account.php">
          <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){echo$_GET['error'];}?></p>
          <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){echo$_GET['message'];}?></p>
          <h3>Change Password</h3>
          <hr class="mx-auto">
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required/>
          </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Confirm Password" required/>
          </div>
          <div class="form-group">
            <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
          </div>
          </form>
      </div>
    </div>
	</section>


  <!-- OrDERs-->
  <section class ="orders container my-5 py-3">
    <div class="container mt-2">
      <h2 class="font-weight-bold text-center">Your Orders</h2>
      <hr class="mx-auto">

      <table class="mt-5 pt-5">
        <tr>
          <th>Order Id</th>
          <th>Order Cost</th>
          <th>Order Status</th>
          <th>Order Date</th>
          <th>Order Details</th>
        </tr>

        <?php while($row = $orders->fetch_assoc() ){ ?>

        <tr>
          
        <td>
          <!--<div class="product-info">
             <img src="assets/imgs"/> 
            <div>
              <p class="mt-3"><?php echo $row['order_id'];?></p>
            </div>
          </div>-->
          <span><?php echo $row['order_id']; ?></span>
        </td>

        <td>
          <span><?php echo $row['order_cost']; ?></span>
        </td>

        <td>
          <span><?php echo $row['order_status']; ?></span>
        </td>

        <td>
          <span><?php echo $row['order_date']; ?></span>
        </td>

        <td>
        <form method="POST" action="order_details.php">
            <input type="hidden" value="<?php echo $row['order_status'];?>" name="order_status"/>
            <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id"/>
            <input class="btn btn-outline-light" name="order_details_btn" type="submit" value="details" />
          </form>
        </td>

      </tr>

    <?php }?>


      </table>
    </div>
  </section>

</div>
</div>