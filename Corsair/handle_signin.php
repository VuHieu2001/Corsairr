<?php

$email = $_POST['email'];
$password = $_POST['password'];

require('./connect/connect.php');

$sql ="select * from customers 
where email ='$email' and password='$password'";
$result = mysqli_query($connect,$sql);
$num_rows = mysqli_num_rows($result);

if($num_rows == 1)
{
    session_start();
    $each = mysqli_fetch_array($result);
    $_SESSION['id']= $each['id'];
    $_SESSION['name']= $each['name'];

    header("location:index.php");
    exit;
}
header("location:index.php?error=Tài khoản hoặc mật khẩu không đúng");
    exit;