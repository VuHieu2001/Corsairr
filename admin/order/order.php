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
                    <h2>Danh sách đơn hàng</h2>
                    <?php 
                    require('../connect/connect.php');
                         $page =1;
                         if(isset($_GET['page'])){
                             $page =$_GET['page'];
                         }
                         

                         $sql_qtyRows = "select count(*) from `order`";
                         $array_qtyRows = mysqli_query($connect,$sql_qtyRows);
                         $result_qtyRows = mysqli_fetch_array($array_qtyRows);
                         $qtyRows = $result_qtyRows['count(*)'];

                         $qtyProductInPage = 10;
                         $qtyPage = ceil($qtyRows/$qtyProductInPage);

                         $skip = $qtyProductInPage * ($page - 1 );
                        
                        $sql ="select `order`.*,customers.name,customers.phone_number,customers.address 
                                from `order`
                                 join customers 
                                 on customers.id = `order`.customer_id
                                 order BY created_at DESC
                                 limit $qtyProductInPage  offset $skip;";

                        $result =mysqli_query($connect,$sql);

                    ?>
                    <table class="table" style="margin-top:10px;">
                            <thead>
                                <tr>
                                <th scope="col">Mã</th>
                                <th scope="col">Thời gian đặt</th>
                                <th scope="col">Thông tin người nhận</th>
                                <th scope="col">Thông tin người đặt</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Chi tiết đơn hàng</th>
                                <th scope="col">Thay đổi trạng thái</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($result as $each) {?>
                                    <tr>
                                        <td><?php echo $each['id']?></td>
                                        <td><?php echo $each['created_at']?></td>
                                        <td>
                                            <?php echo $each['name_receiver']?><br>
                                            <?php echo $each['address_receiver']?><br>
                                            <?php echo $each['phone_receiver']?><br>
                                        </td>
                                        <td>
                                            <?php echo $each['name']?><br>
                                            <?php echo $each['address']?><br>
                                            <?php echo $each['phone_number']?><br>
                                        </td>
                                        <td>
                                            <?php
                                                switch($each['status'])
                                                {
                                                    case '0':
                                                        echo 'Mới đặt';
                                                        break;
                                                    case '1':
                                                        echo 'Đã duyệt';
                                                        break;
                                                    case '2':
                                                         echo 'Đã hủy';
                                                         break;
                                                }
                                            ?>
                                        </td>
                                        <td><?php   echo number_format($each['total_money'],0,',','.') ?>đ</td>
                                        <td>
                                            <a href="detail.php?id=<?php echo $each['id'] ?>">xem</a>
                                        </td>
                                        <td>   
                                            <?php if($each['status'] != 1 ) { ?>
                                            <a href="update_status.php?id=<?php echo $each['id'] ?>&status=1">Duyệt</a><br>
                                            <?php } ?>
                                            <a href="update_status.php?id=<?php echo $each['id'] ?>&status=2">Hủy</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        <?php  for($i=1 ; $i<= $qtyPage ;$i++){ ?>

                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                            
                        <?php }?>
                        </ul>
                    </nav>
                </div>
                   
            </div>
        </div>
        </div>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
                    
       

        <script src="../js/main.js"></script>
</body>
</html>