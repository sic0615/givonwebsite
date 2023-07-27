<?php 
session_start();
/*
  not paid
  shipped
  delivered
*/
include('server/connection.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

  $order_id = $_POST['order_id'];
  $order_status = $_POST['order_status'];
  $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id=?");

  $stmt->bind_param('i', $order_id);

  $stmt->execute();

  $order_details = $stmt->get_result();

  $order_total_price = calculateTotalOrderPrice($order_details);

}else{

  header('location: account.php');
  exit();

}


function calculateTotalOrderPrice($order_details){

  $total = 0;

  foreach($order_details as $row){

    $product_price = $row['product_price'];
    $product_quantity = $row['product_quantity'];

    $total = $total + ($product_price * $product_quantity);

  }


return $total;



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

<!-- OrDERs-->
<section class ="orders container my-5 py-3">
    <div class="order_container container mt-5">
      <h2 class="font-weight-bold text-center">Order Details</h2>
      <hr class="mx-auto">

      <table class="mt-5 pt-5 mx-auto">
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>

  <?php foreach($order_details as $row){ ?>
        <tr>
        <td>
          <div class="product-info">
             <img src="css/imgs/<?php echo $row['product_image'];?>"/> 
            <div>
              <p class="mt-3"><?php echo $row['product_name'];?></p>
            </div>
          </div>
        </td>

        <td>
          <span>PHP<?php echo $row['product_price'];?></span>
        </td>

        <td>
          <span><?php echo $row['product_quantity'];?></span>
        </td>

      </tr>

  <?php } ?>

      </table>

      <?php if($order_status == "not paid"){?>

        <form style="float: right;" method="POST" action="payment.php">

          <input type="hidden" name="order_id" value="<?php echo $order_id;?>"/>
          <input type="hidden" name="order_total_price" value="<?php echo $order_total_price;?>"/>
          <input type="hidden" name="order_status" value="<?php echo $order_status;?>"/>
          <input type="submit" name="order_pay_btn" class="btn btn-outline-light" value="Pay Now"/>
          
        </form>

        <?php } ?>
    </div>
  </section>

</body>
</html>