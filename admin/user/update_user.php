<?php
require('../check_login_admin.php');
    require("../connect/connect.php");  
    $name =$_POST['name'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $id =$_POST['id'];

    $sql = "update admin 
            set
            name= '$name',
            email='$email' ,  
            password='$password' 
            where 
            id ='$id'
            ";
  
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    header("location:user.php");