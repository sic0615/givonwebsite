<?php 

session_start();

if(isset($_POST['add-to-cart'])){


//pag na-add nakapag add na yung user ng product sa cart
  if(isset($_SESSION['cart'])){ 

    $products_array_ids = array_column($_SESSION['cart'],"product_id");
    // pag yung product is added na or not
    if(!in_array($_POST ['product_id'], $products_array_ids )) {

        $product_id = $_POST['product_id'];

          $product_array = array(
                            'product_id' => $_POST['product_id'],
                            'product_name' => $_POST['product_name'],
                            'product_price' => $_POST['product_price'],
                            'product_image' => $_POST['product_image'],
                            'product_quantity' => $_POST['product_quantity'],
          );

          $_SESSION['cart'][$product_id] = $product_array;

    // product has already been added  
    }else{

        echo '<script>alert("Product was already added to dart");</script>';

    }

//pag eto yung first product
  }else{

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $product_array = array(
                      'product_id' => $product_id,
                      'product_name' => $product_name,
                      'product_price' => $product_price,
                      'product_image' => $product_image,
                      'product_quantity' => $product_quantity,
    );

    $_SESSION['cart'][$product_id] = $product_array;


  }
  
// calculate total
  calculateTotalCart();


//REMOVE PRODUCT SA CART
}else if(isset($_POST['remove_product'])){

  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);

  // calculate total
  calculateTotalCart();

//UPDATE QUANTITY
}else if(isset($_POST['edit_quantity'])){

  //1st step: get ng id and quantity sa form
  $product_id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];

  //2nd step: get ng product array sa session
  $product_array = $_SESSION['cart'][$product_id];

  //3rd step: update product quantity
  $product_array['product_quantity'] = $product_quantity;

  //4th step: return array back to its place
  $_SESSION['cart'][$product_id] = $product_array;

  // calculate total
  calculateTotalCart();

}else{
 // header('location: index.php');
}


// calculate total function

function calculateTotalCart(){

  $total = 0;

  foreach($_SESSION['cart'] as $key => $value){

        $product = $_SESSION['cart'][$key];
        $price = $product['product_price'];
        $quantity = $product['product_quantity'];
    
        $total = $total + ($price * $quantity);
  }

  $_SESSION['total'] = $total;

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

        <!--Cart-->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold text-center">Your Cart</h2>
            <hr>
        </div>


    <table class ="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>

    <?php foreach($_SESSION['cart'] as $key => $value){?>

        <tr>
            <td>
                <div class ="product-info">
                    <img src="css/imgs/<?php echo $value['product_image'];?>"/>
                    <div>
                        <p><?php echo $value['product_name'];?></p>
                        <small><span>PHP</span><?php echo $value['product_price'];?></small>
                        <br>

                        <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>      
                            <input type="submit" name="remove_product" class="remove-btn" value="remove"/>                          
                        </form>

                    </div>
                </div>
            </td>

            <td>
                
                <form method="POST" action="cart.php">
                    <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>"/>
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                    <input type="submit"class="edit-btn" value=edit name="edit_quantity"/>
                </form>

            </td>

            <td>
               <span>PHP</span>
               <span class="product-price"><?php echo $value['product_quantity'] * $value ['product_price'];?></span>
            </td>

        </tr>

      <?php } ?>


    </table>

    <div class="cart-total">
        <table> 
            <tr>
                <td>Total</td>
                <td>PHP <?php echo $_SESSION['total'];?></td>
            </tr>
        </table>
    </div>

    <div class="checkout-container">
      <form method="POST" action="checkout.php">
        <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
      </form>
    </div>

  </section>

      

</body>
  
</html>