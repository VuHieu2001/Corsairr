<?php
    require('../connect/connect.php');

    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "update `order` set status = '$status' where id ='$id'";

    echo $sql;
    mysqli_query($connect,$sql);

    header('location:order.php');