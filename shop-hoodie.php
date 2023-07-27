<?php 

include('server/connection.php');

$stmt = $conn->prepare("SELECT * FROM product LIMIT 40, 6");

$stmt->execute();

$products = $stmt->get_result();//array

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
  <body class="shop-body">
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
          <a class="dropdown-item" href="shop-1.php">Street Style</a>
        </li>
        <li>
          <a class="dropdown-item" href="shop-2.php">Classic Design</a>
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
                  <a class="dropdown-item" href="shop-hoodie.php">Classic Hoodies</a> 
                </li>
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


<!-- Products -->
<section id="featured-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-3">
        <h3>Hoodies</h3>
        <hr>
        <p>Here you can check out our hoodies</p>
    </div>
    <div class="container text-center mt-5 py-3">
        <h3>Classic Design</h3>
        <p>Affordable Hoodies</p>
        <hr>
    </div>

    <div class="row mx-auto container-fluid">

    <?php while($row = $products->fetch_assoc()) { ?>
    <div onclick="window.location.href='single-product.php';" class="product text-center col-lg-2 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="css/imgs/<?php echo $row['product_image'];?>"/>
        <div class="star">
        </div>
        <h4 class="p-name"><?php echo $row['product_name'];?></h4>
        <h5 class="p-price">PHP<?php echo $row['product_price'];?></h5>
        <a href="<?php echo "single-product.php?product_id=".$row['product_id'];?>"><button class="btn btn-outline-light">Add to Bag</button></a>
    </div>

    <?php } ?>
    </div>
    

</section>

  </body>
</html>