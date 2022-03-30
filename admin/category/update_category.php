<?php
    require('../check_login_admin.php');
    require("../connect/connect.php");  
    $name =$_POST['name'];
    $img =$_POST['img_thumb'];
    $id =$_POST['id'];

    $sql = "update category 
            set
            name= '$name',
            img_thumb='$img'   
            where 
            id ='$id'
            ";
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    header("location:Category.php");