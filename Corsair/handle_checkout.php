<?php
    $name_receiver= $_POST['name_receiver'];
    $address_receiver= $_POST['address_receiver'];
    $phone_receiver= $_POST['phone_receiver'];

    require('./connect/connect.php');

    session_start();

    $cart = $_SESSION['cart'];

    $total_money =0;
    foreach($cart as $each)
    {
        $total_money += $each['quantity'] * $each['price_sale'];
    }
    $customer_id =$_SESSION['id'];
    $status =0 ;//moi dat
    $sql =" insert into `order`( customer_id ,name_receiver, phone_receiver, address_receiver , status,total_money )
            values ('$customer_id','$name_receiver','$phone_receiver','$address_receiver','$status','$total_money')
            ";
 
     mysqli_query($connect,$sql);

    $sql ="select max(id) from `order` where customer_id= '$customer_id'";
    
    $result = mysqli_query($connect,$sql);
    $order_id = mysqli_fetch_array($result)['max(id)'];
    

    foreach($cart as $product_id =>$each)
    {   $quantity =$each['quantity'];
        $sql = "insert into order_product (order_id,product_id,quantity)
                values ('$order_id','$product_id','$quantity')";
        mysqli_query($connect,$sql);
    }

    unset($_SESSION['cart']);

    header('location:cart.php');