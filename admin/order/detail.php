<?php require('../check_login_admin.php') ?>
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
                    <a href="">
                        <!-- <span class="icon"><ion-icon name="home"></ion-icon></span> -->
                        <span class="title">ADMIN</span>
                    </a>
                </li>
                <li>
                    <a href="../category/Category.php">
                        <span class="icon"><ion-icon name="list"></ion-icon></span>
                        <span class="title">Danh mục </span>
                    </a>
                </li>
                <li>
                    <a href="../product/Product.php">
                        <span class="icon"><ion-icon name="cube"></ion-icon></span>
                        <span class="title">Sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="../root/index.php">
                         <span class="icon"><ion-icon name="analytics"></ion-icon></span>
                        <span class="title">trang chính</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
                <div class="order">
                    <h2>Chi tiết đơn hàng</h2>
                    <?php 
                        require('../connect/connect.php');
                        $order_id = $_GET['id'];
                        $sql ="select * from order_product
                                join product
                                on product.id=order_product.product_id
                                where order_id ='$order_id' ";

                        $result =mysqli_query($connect,$sql);

                    ?>
                    <table class="table" style="margin-top:10px;">
                            <thead>
                                <tr>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng tiền</th>     
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sum = 0;
                                    foreach($result as $each)
                                    {
                                ?>
                                <tr>

                                    <td><img src="<?php echo $each['img']?>" height="50" alt=""></td>
                                    <td><?php echo $each['name']?></td>
                                    <td><?php echo number_format($each['price_sale'],0,',','.')?> đ</td>
                                    <td><?php echo $each['quantity']?></td>
                                    <td><?php 
                                          $total=  $each['price_sale']*$each['quantity']  ; 
                                        
                                        echo number_format($total,0,',','.');
                                        $sum += $total;
                                        ?>đ
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                <td colspan="3"><Strong>Tổng Tiền đơn hàng: </Strong></td>
                                <td colspan="2"> <strong style ="color:#ed1f24"><?php echo number_format($sum) ?>đ </strong></td>
                            </tr>
                            </tbody>
                    </table>
                    <a href="./order.php" style="margin:30px;">quay lại</a>
                </div>
                   
            </div>
        </div>
        </div>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
 

        <script src="../js/main.js"></script>
</body>
</html>