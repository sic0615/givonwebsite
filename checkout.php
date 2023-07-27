<?php 

session_start();

if(!empty($_SESSION['cart'])){
//pag galing cart dito mag da-direct


}else{//pag di galing cart, rekta home page

    header('location: index.php');
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
  <body>
      <!-- header -->
  <div class="header"></div>

<!-- nav bar -->
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
          <a class="nav-link social" href="https://www.instagram.com/givon.clothing/"><i class="fa-brands fa-instagram"></i></a>
        </li>
        <li class="nav-item-dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
          <li>
              <a class="dropdown-item" href="shop.php">Shirts &raquo;</a>
              <ul class="dropdown-menu dropdown-submenu">
        <li>
          <a class="dropdown-item" href="shop.php">Premium Designs</a>
        </li>
        <li>
          <a class="dropdown-item" href="shop-1.php">May Releases</a>
        </li>
        <li>
          <a class="dropdown-item" href="shop-2.php">March Releases</a>
          <!--<ul class="dropdown-menu dropdown-submenu">
            <li>
              <a class="dropdown-item" href="#">Multi level 1</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Multi level 2</a>
            </li>
          </ul>-->
        </li>
      </ul>
      <li>
              <a class="dropdown-item" href="shop-hoodie.php">Hoodies &raquo;</a>
              <ul class="dropdown-menu dropdown-submenu">
        <li>
          <a class="dropdown-item" href="shop-hoodie-1.php">Biker Hoodies</a>
        </li>
              </ul>
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


<!--Checkout-->
<section class="my-5 py-5">
		<div class="container text-center mt-3 pt-5">
			<h2 class="form-weight-bold">Checkout</h2>
		</div>

		<div class="mx-auto container">

				<hr>

			<form id="checkout-form" method="POST" action="server/place_order.php">
        <p class="text-center" style="color: red;">
        <?php if(isset($_GET['message'])){echo $_GET['message'];}?>
        <?php if(isset($_GET['message'])){?>
      
          <a href="login.php" class="btn btn-outline-dark">Login</a>

          <?php } ?>
      </p>        
		<div class="form-group checkout-small-element">
					<label>Name</label>
					<input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required/>
				</div>
        <div class="form-group checkout-small-element">
					<label>Email</label>
					<input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required/>
				</div>
		<div class="form-group checkout-small-element">
					<label>Phone Number</label>
					<input type="tel" class="form-control" id="checkout-font" name="phone" placeholder="Phone" required/>
				</div>
        <div class="form-group checkout-small-element">
                    <label>City</label>
					<input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required/>
				</div>
		<div class="form-group checkout-large-element">
                    <label>Address</label>
					<input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required/>
				</div>
		<div class="form-group checkout-btn-container">
                    <h4>Total Amount: PHP <?php echo $_SESSION['total']?></h4>
					<input type="submit" class="btn btn-outline-dark" id="checkout-btn" name="place_order" value="Place Order"/>
				</div>
			</form>
		</div>
	</section>




</body>  
</html>