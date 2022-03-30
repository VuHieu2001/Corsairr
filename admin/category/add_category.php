
<?php
    include("../connect/connect.php");
    require('../check_login_admin.php');

    $name = $_POST['name'];
    $img_thumb =$_POST['img_thumb'];
    if(empty($_POST['name']) || empty($_POST['img_thumb']))
    {
        header('location:form_insert_category.php?error=Chưa điền đủ thông tin');
        exit;
    }

  

    $sql ="insert into category(name,img_thumb) values('$name','$img_thumb')";
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    
    header('location:form_insert_category.php?success=Thêm thành công');
    
    