<?php
     require("../connect/connect.php");
     require('../check_login_admin.php');
     $id =$_GET['id'];
     $sql = "delete from product where id ='$id'";
     mysqli_query($connect,$sql);
     mysqli_close($connect);
 
     header("location:Product.php");