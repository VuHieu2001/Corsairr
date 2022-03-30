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
                    <h1>Sản Phẩm</h1>
                        <?php
                            include("../connect/connect.php");

                            //pagination
                            $page =1;
                            if(isset($_GET['page'])){
                                $page =$_GET['page'];
                            }
                            

                            $sql_qtyRows = "select count(*) from product";
                            $array_qtyRows = mysqli_query($connect,$sql_qtyRows);
                            $result_qtyRows = mysqli_fetch_array($array_qtyRows);
                            $qtyRows = $result_qtyRows['count(*)'];

                            $qtyProductInPage = 10;
                            $qtyPage = ceil($qtyRows/$qtyProductInPage);

                            $skip = $qtyProductInPage * ($page - 1 );
                            //search
                            $search="";

                            if(isset($_GET['search']))
                            {
                                $search = $_GET['search'];
                            }

                            $sql = "select product.*, category.name as category_name
                                    from product 
                                    join category on product.category_id = category.id 
                                    where
                                     product.name like'%$search%'
                                    limit $qtyProductInPage  offset $skip
                                    ";
                            $result = mysqli_query($connect,$sql);

                        ?>
                    <div class="product-table">
                    <?php if(isset($_GET['search'])) { ?>
                    <span>
                         <p style="color:grey">Kết quả tìm kiếm cho "<?= $search ?>".</p> 
                    </span>
                    <?php } ?>
                    <span>
                        <a href="./form_insert_product.php">
                            <ion-icon name="add"></ion-icon>
                            Thêm Sản Phẩm
                        </a>
                    </span>
                    <table class="table" style="margin-top:10px;">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Giá giảm</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $n=1;
                                    foreach($result as $each)
                                    {
                                ?>
                                <tr>
                                <th scope="row"><?php echo $n++?></th>
                                <td><?php echo $each['name']?></td>
                                <td><img src="<?php echo $each['img']?>" height="50" alt=""></td>
                                <td><?php echo number_format($each['price'],0,',','.')?> đ</td>
                                <td><?php echo number_format($each['price_sale'],0,',','.')?> đ</td>
                                <td><?php echo $each['category_name']?></td>
                                <td>
                                    <a href="./form_update_product.php?id=<?php echo $each['id'] ?>">
                                        <ion-icon name="create" style="font-size: 20px; color:#287bff;"></ion-icon>
                                    </a>
                                </td>
                                <td>
                                    <a href="./delete.php?id=<?php echo $each['id'] ?>">
                                         <ion-icon name="trash" style="font-size: 20px; color:#287bff;"></ion-icon>
                                    </a>
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
        </div>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
                    
       

        <script src="../js/main.js"></script>
</body>
</html>