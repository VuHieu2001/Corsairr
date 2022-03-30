
<?php
     require("../connect/connect.php");
     require('../check_login_admin.php');
     $id =$_POST['id'];
     $name = $_POST['name'];
     $img =$_POST['img_thumb'];
     $img_1 = $_POST['img_1'];
     $img_2 = $_POST['img_2'];
     $img_3 = $_POST['img_3'];
     $description = $_POST['description'];
     $category_id = $_POST['category_id'];
     $price =$_POST['price'];
     $price_sale = $_POST['price_sale'];

     $sql = " update product 
              set
              name = '$name',
              img = '$img',
              img_1 = '$img_1',
              img_2 = '$img_2',
              img_3 = '$img_3',
              description = '$description',
              category_id ='$category_id',
              price = '$price',
              price_sale = '$price_sale'

              where id = $id
            ";

    mysqli_query($connect,$sql);
    mysqli_close($connect);

    header("location:Product.php");