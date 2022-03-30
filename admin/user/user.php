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
            
        <div class="category">
        <h1>Danh sách Nhân viên</h1>
        
        <?php
            require("../connect/connect.php");
            //pagination
            $page =1;
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
            }
            
            $sql_qtyRows = "select count(*) from admin";
            $array_qtyRows = mysqli_query($connect,$sql_qtyRows);
            $result_qtyRows = mysqli_fetch_array($array_qtyRows);
            $qtyRows = $result_qtyRows['count(*)'];
            
            $qtyRowsInPage = 4;
            $qtyPage = ceil($qtyRows / $qtyRowsInPage);

            $skips = $qtyRowsInPage * ($page-1);
            //search
            $search="";

                 if(isset($_GET['search']))
                 {
                     $search = $_GET['search'];
                }


            $sql = "select * from admin 
                    
                    limit $qtyRowsInPage offset $skips ";
            $result = mysqli_query($connect,$sql);
        ?>
        <div class="table-content">
            <?php if(isset($_GET['search'])) { ?>
                 <span>
                    <p style="color:grey">Kết quả tìm kiếm cho "<?= $search ?>".</p> 
                </span>
            <?php } ?>
            <span>
                <a href="./form_insert_user.php">
                    <ion-icon name="add"></ion-icon>
                    Thêm 
                </a>
            </span>
            <table class="table  " style="margin-top:10px;">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên </th>
                    <th scope="col">Mật khẩu </th>
                    <th scope="col">Email</th>
                    <th scope="col">sửa</th>
                    <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <?php 
                $n=1;
                foreach($result as $each){ ?>
                <tbody   style="line-height: 80px;" >
                    <tr>
                    <th scope="row"><?php echo $n++?></th>
                    <td ><?php echo $each['name']?></td>
                    <td><?php echo $each['password']?></td>
                    <td><?php echo $each['email']?></td>
                    <td>
                        <a href="./form_update_user.php?id=<?php echo $each['id'] ?>"> 
                        
                        <ion-icon name="create" style="font-size: 20px; color:#287bff;"></ion-icon>
                            
                        </a>
                    </td>
                    <td>
                        <a href="./delete.php?id=<?php echo $each['id'] ?>"> 
                        <ion-icon name="trash" style="font-size: 20px; color:#287bff;"></ion-icon>
                        </a>
                    </td>
                    </tr>
                    
                </tbody>
                <?php } ?>
            </table>
                
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                <?php  for($i=1 ; $i<= $qtyPage ;$i++){ ?>

                    <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                    
                 <?php }?>
                </ul>
            </nav>
        </div>

        <?php  mysqli_close($connect); ?>
        
</div> 
                    
            </div>
        </div>
        </div>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
                    
       

        <script src="../js/main.js"></script>
</body>
</html>

