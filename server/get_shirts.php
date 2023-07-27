<?php 

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM product WHERE product_category='Shirt' LIMIT 4");

$stmt->execute();

$shirts_products = $stmt->get_result();//array

?>