<?php
    require('../check_login_admin.php');
    $id =$_GET['id'];
    require("../connect/connect.php");

    $sql = "delete from category where id ='$id'";
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    header("location:Category.php");
     