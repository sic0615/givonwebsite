<?php 

include('server/connection.php');

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM product WHERE product_id = ?");
  $stmt->bind_param("i",$product_id);

  $stmt->execute();
  
  $product = $stmt->get_result();//array

}else{

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
<!-- Single Product -->
    <section class = "container single-product my-5 pt-5">
        <div class="row mt-5">

        <?php while($row = $product->fetch_assoc()){?>


        
          

            <div class="col-lg-4 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="css/imgs/<?php echo $row['product_image']; ?>"/>
                <div class="small-img-group">
                  <div class = "small-img-col">
                      <img src="css/imgs/<?php echo $row['product_image']; ?>" width = "100%" class="small-img"/>
                   </div>
                  <div class = "small-img-col">
                      <img src="css/imgs/<?php echo $row['product_image2']; ?>" width = "100%" class="small-img"/>
                  </div>
                  <div class = "small-img-col">
                      <img src="css/imgs/<?php echo $row['product_image3']; ?>" width = "100%" class="small-img"/>
                  </div>
                  <div class = "small-img-col">
                      <img src="css/imgs/<?php echo $row['product_image4']; ?>" width = "100%" class="small-img"/>
                  </div>
                </div>
            </div>

            
        <div class = "col-lg-6 col-md-12 col-12">
                <h5>Premium Design</h5>
                <h3 class ="py-4"><?php echo $row['product_name']; ?></h3>
                <h2> PHP <?php echo $row['product_price']; ?></h2>
                
                <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
                    <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"/>
                    <input type="number" name="product_quantity" value="1"/>
                    <button class="btn btn-outline-dark" type="submit" name="add-to-cart">Add to Cart</button>
                </form> 
   
                <h4 class = "mt-5 mb-5">Product Details</h4>
                <span><?php echo $row['product_description']; ?></span>
          </div>
        

          <?php } ?>

      </div>

    </section>


<!--Related Product-->
<section id="related-product" class="w-100 mt-5">
    <div class="featured-text">
   <h2>Related Products</h2>
        
    </div>
    <a class="nav-link" href="shop.php">
      <div class="row p-0 m-0">
        
        <div class="one col-lg-3 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="css/imgs/brand-1.jpg"/>
            <div class="details">
              <h2>Sculle</h2>
              <a class="nav-link"  href="shop.php"><button class="btn btn-outline-dark" >Shop Now</button></a>
           </div>
        </div>
        
        <div class="one col-lg-3 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="css/imgs/brand-2.jpg"/>
            <div class="details">
              <h2>Ivy</h2>
              <a class="nav-link" href="shop.php"><button class="btn btn-outline-dark">Shop Now</button></a>
           </div>
        </div>
        
        <div class="one col-lg-3 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="css/imgs/brand-3.jpg"/>
            <div class="details">
              <h2>Seneca</h2>
              <a class="nav-link" href="shop.php"><button class="btn btn-outline-dark">Shop Now</button></a>
           </div>
        </div>

        <div class="one col-lg-3 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="css/imgs/brand-4.jpg"/>
            <div class="details">
              <h2>Streak</h2>
              <a class="nav-link" href="shop.php"><button class="btn btn-outline-dark">Shop Now</button></a>
           </div>
        </div>
    </div>
    </a>     
    </section>
      

</body>
  
</html>