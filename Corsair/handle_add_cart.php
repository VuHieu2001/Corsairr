<?php
    require('./connect/connect.php');
     session_start();

     $id = $_GET['id'];

     if(empty($_SESSION['cart'][$id]))
     {
         $sql = " select * from product where id ='$id' ";
         $result = mysqli_query($connect,$sql);
         $each=mysqli_fetch_array($result);
         $_SESSION['cart'][$id]['name'] = $each['name']; 
         $_SESSION['cart'][$id]['img'] = $each['img'];  
         $_SESSION['cart'][$id]['price_sale'] = $each['price_sale']; 
         $_SESSION['cart'][$id]['quantity'] =1 ;
     }
     else{
        $_SESSION['cart'][$id]['quantity']++;
     }
   header('location:cart.php');
