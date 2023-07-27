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
          <a class="nav-link social" href="https://www.facebook.com/profile.php?id=100094827305378"><i class="fa-brands fa-facebook"></i></a>
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
    </div>


<!--Slider-->
<a href="shop.php"><div class="slider"></div></a>
    <!-- Home-->
    <section id="home">
      <div class="home-text">
        <a class="nav-link" href="shop.php"><button class="home-shop-now btn btn-outline-dark">Shop Now</button></a>
      </div>
    </section> 

<div>
  <h1>dsdsdsd</h1>
</div>
<!-- Voucher -->

    <!--Home Products-->
    <section id="home-product" class="w-100">
    <div class="featured-text">
   <h1>Best Selling</h1>
        <h5>Discounted prices for first time buyers</h5>
    </div>
    <a class="nav-link" href="shop.php">
      <div class="row p-0 m-0">

      <?php include ('server/get_featured_products.php')?>


      <?php while($row = $featured_products->fetch_assoc()){?>

        <div class="one col-lg-3 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="css/imgs/<?php echo $row['product_image'];?> "/>
            <div class="details">
              <h2 class="p-name"><?php echo $row['product_name'];?></h2>
              <h2 class="p-price">PHP <?php echo $row['product_price'];?></h2>
              <a class="nav-link"  href="<?php echo "single-product.php?product_id=". $row['product_id'];?>"><button class="btn btn-outline-dark" >Buy Now</button></a>
           </div>
        </div>
      
       <?php } ?>
    </div>
    </a>    
    </section>
      
  </body>
  
</html>

