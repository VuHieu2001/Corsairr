<?php
     session_start();
     require('./connect/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css">
     <link rel="stylesheet" href="./css/base.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,300&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title> Giỏ hàng | Corsair</title>
</head>
<body>
        <header>
            <div class="header">
                <div class="header-nav-width">
                    <div class="header-icon">
                        <a href="index.php">
                            <img src="https://cwsmgmt.corsair.com/img/reusable/corsair-logo.svg" alt="">
                        </a>
                    </div>
                    <div class="header-search">
                        <form action="search.php?search=search">
                                <input type="search" placeholder="Search Here" name="search">
                                <ion-icon name="search"></ion-icon>

                        </form>
                    </div>
                    <div class="header-main">
                        <div class="header-main-cart">
                            <a href="cart.php">
                                <ion-icon name="cart"></ion-icon>
                            </a>
                        </div>
                        <div class="header-main-account">
                            <?php if(empty($_SESSION['id'])){ ?>
                                <div  class="MD-signin js-signin" >
                                    SIGN IN
                                </div>
                                <span class="divide">|</span>
                                <div class="MD-signup js-signup">
                                    JOIN US
                                </div>
                            <?php }else{ ?>
                                <a href="signout.php" class="signout">Đăng xuất</a>
                            <?php } ?>
                        </div>
                        

                    </div>
                </div>
                
            </div>

        </header>

    <main>
        <div class="content">
            <div class="grid content-main">

                <?php  
                    
                    if(empty($_SESSION['cart'])) 
                    {
                ?> 
                    <div class="cart-notify">
                        <div class="cart-notify-img">
                             <img height="100" src="https://fptshop.com.vn/cart/Content/Desktop/images/empty-cart.png" alt="">   
                        </div>
                        <h5>Không có sản phẩm nào trong giỏ hàng</h5>
                        <a href="index.php" class="btn-add-cart">quay lai trang chu</a>
                    </div>
                <?php     
                    }
                    else{
                        $cart = $_SESSION['cart'] ;
                ?>
                <div class="cart-heading">
                    <h2>GIỎ HÀNG</h2>
                </div>
                <div class="cart-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá tiền </th>
                                <th scope="col">Xóa </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $total =0;
                                $sum=0;
                                foreach($cart as $id =>$each) { 
                            ?>
                            <tr>   
                                <td class="image">
                                    <img style="height: 100px;" src="<?php echo $each['img'] ?>" alt="">
                                </td>
                                <td class="item">
                                    <a href="productDetail.php?id=">
                                        <strong><?php echo $each['name'] ?></strong>
                                    </a>
                                    
                                </td>
                                <td class="qty">
                                    <a href="handle_change_qty.php?id=<?php echo $id ?>&type=decre" class="change-qty">-</a>
                                    <span><?php echo $each['quantity'] ?></span>
                                    <a href="handle_change_qty.php?id=<?php echo $id ?>&type=incre" class="change-qty">+</a>
                                </td>
                                <td class="total">
                                    <span>
                                            <?php 
                                                $total= $each['quantity'] * $each['price_sale'] ;
                                                echo number_format($total);
                                                $sum += $total;
                                            ?>đ
                                        
                                        </span>
                                </td>
                                <td class="delete">
                                    <a href="handle_delete_cart.php?id=<?php echo $id ?>">X</a>
                                </td>
                            </tr>
                            <?php } ?>
                            
                            <tr>
                                <td colspan="3"><Strong>Tổng Tiền: </Strong></td>
                                <td colspan="2"> <strong style ="color:#ed1f24"><?php echo number_format($sum) ?>đ </strong></td>
                            </tr>
                            
                           
                        </tbody>
                    </table>
                </div>
                <div class="cart-checkout">
                    <?php  
                        if(isset($_SESSION['id']))
                        {
                            $id = $_SESSION['id'];
                        }

                        $sql =  "select * from customers where id ='$id'";
                        $result = mysqli_query($connect, $sql);
                        $each = mysqli_fetch_array($result);
                    ?>
                    <h3>Thông tin người nhận</h3>
                    <form method="post" action="handle_checkout.php">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Họ và tên</label>
                            <input type="text" name="name_receiver" value="<?php if(isset($_SESSION['id'])) echo $each['name'] ?>" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                            <input type="text" name="address_receiver" value="<?php if(isset($_SESSION['id'])) echo $each['address'] ?>" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone_receiver" value="<?php if(isset($_SESSION['id'])) echo $each['phone_number'] ?>" class="form-control" id="exampleFormControlInput1">
                        </div>

                        <button class="btn-add-cart">
                            Đặt hàng
                        </button>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <footer>
            <div class="footer-main">
                <div class="footer-wrapper">
                    <div class="info">
                        <div class="column">
                            <h3>SHOP</h3>
                            <p>
                                <a href="">New Product</a>
                            </p>
                            <p>
                                <a href="">Where to Buy</a>
                            </p>
                        </div>
                        <div class="column">
                            <h3>EXPLORE</h3>
                            <p>
                                <a href="">CORSAIR Innovation</a>
                            </p>
                            <p>
                                <a href="">Custom Cooling</a>
                            </p>
                            <p>
                                <a href="">CORSAIR Gaming</a>
                            </p>
                            <p>
                                <a href="">Esports</a>
                            </p>
                            <p>
                                <a href="">Blog</a>
                            </p>
                        </div>
                        <div class="column">
                            <h3>CORSAIR</h3>
                            <p>
                                <a href="">About</a>
                            </p>
                            <p>
                                <a href="">Investor Relations</a>
                            </p>
                            <p>
                                <a href="">Careers</a>
                            </p>
                            <p>
                                <a href="">Social Impact</a>
                            </p>
                            <p>
                                <a href="">Press Room</a>
                            </p>
                            <p>
                                <a href="">Contact Us</a>
                            </p>
                        </div>
                        <div class="column">
                            <h3>SUPPORT</h3>
                            <p>
                                <a href="">Downloads</a>
                            </p>
                            <p>
                                <a href="">Customer Support</a>
                            </p>
                            <p>
                                <a href="">Warranty</a>
                            </p>
                            <p>
                                <a href="">RMA/Returns</a>
                            </p>
                            <p>
                                <a href="">Terms of Sale</a>
                            </p>
                        </div>
                    </div>
                    <div class="signup">
                        <div class="signup-wrapper">
                            <div class="callout">
                                <h2 class="text-yellow">Be the first to know</h2>
                                <h2>Get special offers, exclusive product news, and event info straight to your inbox.</h2>
                            </div>
                            <div class="email">
                                <form >
                                    <input type="text" id="email-field" placeholder="ENTER EMAIL ADDRESS">
                                    <input type="submit" id="submit-btn" value="SEND">
                                </form>
                            </div>
                            <div class="soical-wrapper">
                                <div class="social">
                                    <a href=""><ion-icon name="logo-twitter"></ion-icon></a>
                                    <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
                                    <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
                                    <a href=""><ion-icon name="logo-youtube"></ion-icon></a>
                                    <a href=""><ion-icon name="logo-twitch"></ion-icon></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="partner-link">
                    <span class="line-divide">|</span>
                    <a href="">
                        <img src="https://cwsmgmt.corsair.com/hybris/homepage/images/hp_elgato_logo.png?id=elgato" alt="">
                    </a>
                    <span class="line-divide">|</span>
                    <a href="">
                        <img src="https://cwsmgmt.corsair.com/hybris/homepage/images/hp_origin_logo.png" alt="">
                    </a>
                    <span class="line-divide">|</span>
                    <a href="">
                        <img src="https://cwsmgmt.corsair.com/hybris/homepage/images/hp_scuf_logo.png" alt="">
                    </a>
                    <span class="line-divide">|</span>
                    <a href="">
                        <img src="https://cwsmgmt.corsair.com/hybris/homepage/images/hp_gamersensei_logo.png" alt="">
                    </a>
                </div>
                <div class="copyright">
                Copyright © 1996 - 2022 CORSAIR. All rights reserved. | 
                <a href="">Terms of Use</a>
                |
                <a href="">Privacy Policy</a>
                |
                <a href="">Cookies Settings</a>
                |
                <a href="">Sitemap</a>
                </div>
            </div>
    </footer>

         <?php include('./signin.php') ?>
        <?php include('./signup.php') ?>
        <script src="./js/main.js"></script>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>