<?php
    include("../connect/connect.php");
    require('../check_login_admin.php');
    $name = $_POST['name'];
    $img =$_POST['img_thumb'];
    $img_1 = $_POST['img_1'];
    $img_2 = $_POST['img_2'];
    $img_3 = $_POST['img_3'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $price =$_POST['price'];
    $price_sale = $_POST['price_sale'];

    if(empty($_POST['name']) || empty($_POST['img_thumb']) || empty( $_POST['description']) || empty($_POST['category_id']) || empty($_POST['price']) || empty($_POST['price_sale']))
         {
            header("location:form_insert_product.php?error= Bạn chưa điền đủ thông tin");
            exit;
         }
    
 $sql ="insert into 
        product
        (name,img,img_1,img_2,img_3,description,category_id,price,price_sale) 
        values
        ('$name','$img','$img_1','$img_2','$img_3','$description','$category_id','$price','$price_sale')
        ";
  
 mysqli_query($connect,$sql);
 mysqli_close($connect);
     
         
 header('location:form_insert_product.php?success=Thêm thành công');