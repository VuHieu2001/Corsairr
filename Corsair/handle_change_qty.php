<?php 

    session_start();
    $id =$_GET['id'];
    $type =$_GET['type'];

    if($type === 'decre' && isset($_SESSION['cart'][$id]) )
    {
        if($_SESSION['cart'][$id]['quantity'] > 1)
        {
   
          $_SESSION['cart'][$id]['quantity']--;
        }
        else{
          unset($_SESSION['cart'][$id]);
        }
    }
    elseif($type === 'incre' && isset($_SESSION['cart'][$id]) ){
        $_SESSION['cart'][$id]['quantity']++;
    }
 
    

    header('location:cart.php');