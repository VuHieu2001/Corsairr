
<?php
    include("../connect/connect.php");
    require('../check_login_admin.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($_POST['name']) || empty($email = $_POST['email']) || empty($password = $_POST['password']) )
    {
        header('location:form_insert_user.php?error=Chưa điền đủ thông tin');
        exit;
    }

  

    $sql ="insert into admin(name,email,password) values('$name','$email','$password')";
    echo $sql;
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    
    header('location:form_insert_user.php?success=Thêm thành công');