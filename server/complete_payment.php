<?php 

session_start();

include('connection.php');


if(isset($_GET['transaction_id']) && isset($_GET['order_id'])){

            $order_id = $_GET['order_id']; 
            $order_status = "paid";
            $transaction_id = $_GET['transaction_id'];
            $user_id = $_SESSION['user_id'];
            //Change order_status to paid
            $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
            $stmt->bind_param('si', $order_status, $order_id );

            $stmt->execute();

            //Store payment info in database

            $stmt1 = $conn->prepare("INSERT INTO payments (order_id,user_id,transaction_id)
                                VALUES (?,?,?); ");

            $stmt1->bind_param('iii',$order_id,$user_id,$transaction_id);

            $stmt1->execute();

            //Go to user account
            header("location: ../account.php?payment_message=Thank You So Much for Your Order! I Hope You Enjoy Your New Purchase! ");
}else{
    header("location: index.php");
    exit;
}




?>