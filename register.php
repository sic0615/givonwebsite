<?php

session_start();

include('server/connection.php');

//pag registered na yung user, di na pwedeng mabuksan yung registration menu
if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  die();
}


if(isset($_POST['register'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  //if pwassword dont match
  if($password !== $confirmPassword){
    header('location: register.php?error=password do not match, please try again');
  }

  //if password is less than 6 char
  else if(strlen($password) < 6 ){
    header('location: register.php?error=password must be at least 6 characters');
  }

  //pag walang error
  else{
          //check whether there is a user with this email or not
          $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email=?");
          $stmt1->bind_param('s',$email);
          $stmt1->execute();
          $stmt1->bind_result($num_rows);
          $stmt1->store_result();
          $stmt1->fetch();

          //if registered na yung user with this email
              if($num_rows != 0){
                header("location: register.php?error=User with this email already exist ");
              }

              //if now user registered with this email
              else{

                //create a new user  
                $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                                VALUES (?,?,?)");

                $stmt->bind_param('sss',$name,$email,md5($password));
                
                //if account was created succesfully
                if($stmt->execute()){
                      $user_id = $stmt->insert_id;
                      $_SESSION['user_id'] = $user_id;
                      $_SESSION['user_email'] = $email;
                      $_SESSION['user_name'] = $name;
                      $_SESSION['logged_in'] = true;
                      header('location: account.php?register_success=Registered Successfuly!');
                
                //if account is not created successfully
                }else{
                      header('location: register.php?error=could not create and account at the moment');
                }
   
              }
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
    
	<!--Register-->
	<section class="my-5 py-5">
		<div class="container text-center mt-3 pt-5">
			<h2 class="form-weight-bold">Register</h2>
      <hr class="mx-auto">
		</div>

		<div class="mx-auto container">
			<form id="register-form" method="POST" action="register.php">
        <p style="color: red;"><?php if(isset($_GET['error'])) echo $_GET['error'];?></p>
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required/>
				</div>
        <div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required/>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required/>
				</div>
        <div class="form-group">
					<label>ConfirmPassword</label>
					<input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Password" required/>
				</div>
				<div class="form-group">
					<input type="submit" class="btn" id="register-btn" name="register" value="Register"/>
				</div>
				<div class="form-group">
					<a id="login-url" href="login.php"class="btn">Do you have account? Login</a>
				</div>
			</form>
		</div>
	</section>



</div>
</div>