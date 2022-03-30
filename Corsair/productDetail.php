<?php
     session_start();
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
    
    <title>Product Detail</title>
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
        <div class="product-detail">
            <div class="wrapper">

            <?php 
                require('./connect/connect.php');
                $id = $_GET['id'];
                $sql = "select * from product where id='$id'";
                $result = mysqli_query($connect,$sql);
                $each =mysqli_fetch_array($result);
            ?>
                <div class="img-container">
                    <div class="list-img">
                        <img class="thumbnail active" src="<?php echo $each['img'] ?>" alt="">
                        <img class="thumbnail " src="<?php echo $each['img_1'] ?>" alt="">
                        <img class="thumbnail" src="<?php echo $each['img_2'] ?>" alt="">
                        <img class="thumbnail" src="<?php echo $each['img_3'] ?>" alt="">
                    </div>
                    <div class="img-main">
                        <img id="featured" src="<?php echo $each['img'] ?>" alt="">
                    </div>
                </div>
                <div class="detail-container">
                        <h1><?php echo $each['name'] ?></h1>

                        <div class="product-price">
                            <span class="price-text">Gia cu:</span>
                            <span class="product-price">
                                    <del><?php echo number_format($each['price'])?>đ</del>
                            </span>
                            <br>
                            <span class="price-text">Gia moi:</span>
                            <span class="product-price-sale"><?php echo  number_format($each['price_sale'])?>đ</span>
                        </div>

                        <div class="product-overview">
                            <p><?php echo $each['description'] ?></p>
                        </div>

                        <a href="handle_add_cart.php?id=<?php echo $each['id'] ?>" class="btn-add-cart w50">Thêm vào giỏ hàng</a>


                </div>

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