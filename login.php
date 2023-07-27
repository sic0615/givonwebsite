<?php 

session_start();
include('server/connection.php');

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit();
}


if(isset($_POST['login_btn'])){

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email=? AND user_password=? LIMIT 1");
  $stmt->bind_param('ss', $email, $password);

  if($stmt->execute()){
    $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
    $stmt->store_result();

    if($stmt->num_rows()==1){
      $stmt->fetch();

      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_email'] = $user_email;
      $_SESSION['logged_in'] = true;

      header('location: account.php?login_success=logged in successfully');

    }else{
      //error
      header('location: login.php?error=could not verify your account');

  }
  }else{
    //error
    header('location: login.php?error=something went wrong');

  }
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
    
	<!--Login-->
	<section class="my-5 py-5">
		<div class="container text-center mt-3 pt-5">
    <h2 class="form-weight-bold">Login</h2>
		</div>

		<div class="mx-auto container">
			<form id="login-form" method="POST" action="login.php">
        <p style="color:red" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required/>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/>
				</div>
				<div class="form-group">
        <a href="index.php"><input type="submit" class="btn" name="login_btn" id="login-btn" value="Login"/></a>
				</div>
				<div class="form-group">
					<a id="register-url" href="register.php" class="btn">Don't have account? Register</a>
				</div>
			</form>
		</div>
	</section>



</div>
</div>