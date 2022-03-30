<?php require('../check_login_admin.php'); ?>
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
                    <a href="../product/Product.php">
                        <span class="icon"><ion-icon name="cube"></ion-icon></span>
                        <span class="title">Sản Phẩm</span>
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
                    <a href="./user.php">
                        <span class="icon"><ion-icon name="cash"></ion-icon></span>
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
           
        <div class="category">
            <div class="insert-cate">
                <?php   require("../connect/connect.php") ;
                        $id=$_GET['id'];
                        $sql = "select * from admin where id='$id'";
                        $result = mysqli_query($connect,$sql);
                        $each = mysqli_fetch_array($result);
                ?>
                <div class="form-insert">
                <form method="post" action="./update_user.php" >
                        <span>Tên </span>
                        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
                        <input type="text" name="name" value="<?php echo $each['name'] ?>" >
                        <br>
                        <span>Email</span>
                        <input type="text" name="email" value="<?php echo $each['email'] ?>" >
                        <br>
                        <span>Mật khẩu</span>
                        <input type="text" name="password" value="<?php echo $each['password'] ?>" >
                        <br>
                        <button>Sửa</button>
                        <br>
                        <?php 
                              if(isset($_GET['error']))
                              {
                            ?>
                            <span style="color:red;">*<?php echo($_GET['error']);?></span>
                          <?php
                             }
                             elseif(isset($_GET['success']))
                             {
                           ?>
                                <span style="color:green;">*<?php echo($_GET['success']);?></span>
                        <?php   
                             }
                             else
                        
                        ?>

                    </form>
                    <?php  mysqli_close($connect); ?>
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

