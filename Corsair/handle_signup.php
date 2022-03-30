<?php 

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];


    require('./connect/connect.php');

    $sql ="select count(*) from customers 
            where email ='$email'";
    $result = mysqli_query($connect,$sql);
    $num_rows = mysqli_fetch_array($result)['count(*)'];
    
    if($num_rows == 1)
    {
        header('location:index.php?error=Email này đã được sử dụng ');
        exit;
    }

    $sql="insert into customers(name,email,password,phone_number,address)
            value('$name','$email','$password','$phone_number','$address')";
    mysqli_query($connect,$sql);

    $sql="select id from customers where email = '$email'";
    $result=mysqli_query($connect,$sql);
    $id = mysqli_fetch_array($result)['id'];
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    header("location:index.php");
    exit;

    mysqli_close($connect);