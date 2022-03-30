<?php require('../check_login_admin.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,300&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard</title>
</head>
<body>
    <div class="container">

    <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <!-- <span class="icon"><ion-icon name="home"></ion-icon></span> -->
                        <span class="title">ADMIN</span>
                    </a>
                </li>
                <li>
                    <a href="../category/Category.php">
                        <span class="icon"><ion-icon name="list"></ion-icon></span>
                        <span class="title">Danh mục</span>
                    </a>
                </li>
                <li>
                    <a href="./Product.php">
                        <span class="icon"><ion-icon name="cube"></ion-icon></span>
                        <span class="title">Sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="../root/index.php">
                        <span class="icon"><ion-icon name="analytics"></ion-icon></span>
                        <span class="title">Trang chính</span>
                    </a>
                </li>
                <li>
                    <a href="../order/order.php">
                        <span class="icon"><ion-icon name="cash"></ion-icon></span>
                        <span class="title">Đơn hàng</span>
                    </a>
                </li>
                <li>
                    <a href="../user/user.php">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <span class="title">Nhân viên</span>
                    </a>
                </li>
                <li>
                    <a href="../logout_admin.php">
                        <span class="icon"><ion-icon name="log-out"></ion-icon></span>
                        <span class="title">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- main -->

        <div class="main">
        
            <?php include("../topBar.php") ?>
            <div class="content">
           
                <div class="product">
                
                <div class="insert-product">

                    <?php 
                            include("../connect/connect.php");
                            $sql="select * from category";
                            $result = mysqli_query($connect,$sql);

                            
                            $id=$_GET['id'];
                            $sql_product = "select * from product where id='$id'";
                            $result_product = mysqli_query($connect,$sql_product);
                            $each = mysqli_fetch_array($result_product);
                    
                    ?>
                    <div class="form-insertProduct">
                        <form action="./update_product.php"  method="post" >
                                <input type="hidden" name="id" value="<?= $each['id'] ?>" >
                                <div class="row-input" >
                                    <span>Tên Sản Phẩm</span>
                                    <input type="text" name="name" value="<?= $each['name'] ?>" >
                                </div>
                                <div class="row-input" >
                                    <span>Link ảnh</span>
                                    <input type="text" name="img_thumb" value="<?= $each['img'] ?>" >
                                </div>
                                <div class="row-input" >
                                    <span>Link ảnh 1</span>
                                    <input type="text" name="img_1" value="<?= $each['img_1'] ?>">
                                 </div>
                                 <div class="row-input" >
                                    <span>Link ảnh 2</span>
                                    <input type="text" name="img_2" value="<?= $each['img_2'] ?>">
                                 </div>
                                 <div class="row-input" >
                                    <span>Link ảnh 3</span>
                                    <input type="text" name="img_3" value="<?= $each['img_3'] ?>" >
                                </div>
                                <div class="row-input" >
                                    <span>Mô tả</span>
                                    <Textarea name="description"> <?= $each['description'] ?> </Textarea>
                                 </div>
                                 <div class="row-input" >
                                    <span>Danh Mục</span>
                                    <select  name="category_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            
                                           <?php foreach($result as $each_cate){ ?>
                                                <option value="<?php echo $each_cate['id'] ?>"
                                                    <?php 
                                                        if($each['category_id'] == $each_cate['id'])
                                                        { ?>
                                                        selected
                                                     <?php  }?> >
                                                     <?= $each_cate['name'] ?>
                                                </option>
                                            <?php } ?>
                                    </select>
                                 </div>
                                 <div class="row-input" >
                                    <span>Giá </span>
                                    <input type="text" name="price" value="<?= $each['price'] ?>" >
                                </div>
                                <div class="row-input" >
                                    <span>Giá Khuyến Mãi</span>
                                    <input type="text" name="price_sale" value="<?= $each['price_sale'] ?>" >
                                </div>
                               
                                <button>Cập nhật</button>
                                <br>
                        </form>
                    </div>
                       
                </div>
        
             </div> 
                    
            </div>
        </div>
        </div>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
                    
       

        <script src="../js/main.js"></script>
</body>
</html>

