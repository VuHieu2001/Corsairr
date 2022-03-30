
<?php
     session_start();
?><!DOCTYPE html>
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
    
    <title>Case | Corsair</title>
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
        <?php 
            require('./connect/connect.php');

             //pagination
             $page =1;
             if(isset($_GET['page'])){
                 $page =$_GET['page'];
             }
             

             $sql_qtyRows = "select count(*) from product";
             $array_qtyRows = mysqli_query($connect,$sql_qtyRows);
             $result_qtyRows = mysqli_fetch_array($array_qtyRows);
             $qtyRows = $result_qtyRows['count(*)'];

             $qtyProductInPage = 12;
             $qtyPage = ceil($qtyRows/$qtyProductInPage);

             $skip = $qtyProductInPage * ($page - 1 );

            $sql="select product.* 
                  from product 
                  join category 
                  on category.id=product.category_id 
                  WHERE category.name='Cases'
                  limit $qtyProductInPage  offset $skip";
            $result = mysqli_query($connect,$sql);
        ?>
        <div class="slide">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
                <div class="carousel-indicators" style="margin: 0 auto; width:40%; padding-bottom:8px;">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" style="width: 33.333333%;;" class=" active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" style="width: 33.333333%;"  aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" style="width: 33.333333%;"  aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner"  >
                    <div class="carousel-item active">
                    <img src="https://cwsmgmt.corsair.com/hybris/tlc/cases/tlc_banner_cases_5000x_ql.jpg" class="slide-img" alt="..." >
                    <div class="slide-content ">
                        <h1>  PC CASES </h1>
                        <p  style="font-weight: 500;">CUE 5000X RGB QL <br> MID-TOWER ATX CASE </p>
                        <button>
                            SHOP NOW
                        </button>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="https://cwsmgmt.corsair.com/hybris/tlc/cases/tlc_banner_cases_7000x.jpg" class="slide-img" alt="..." >
                    <div class="slide-content">
                        <h1>PC CASES</h1>
                        <p style="font-weight: 500;">CUE 7000X RGB <br> FULL-TOWER ATX CASE</p>
                        <button>
                            SHOP NOW
                        </button>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="https://www.corsair.com/corsairmedia/sys_master/productcontent/TLC_cases.jpg" class="slide-img" alt="..." >
                    <div class="slide-content">
                        <h1>GAMING PC CASES</h1>
                        <p>HELP ME CHOOSE A PC CASE</p>
                        <button>
                            LEARN MORE
                        </button>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="content">
            <div class="grid">
                <div class="categoryHeading">
                    <p>Browse By Category</p>
                </div>
                <div class="grid__row">
                    <?php foreach($result as $each) {?>
                    <div class="grid__col-3">
                        <div class="home-product">
                            <div class="home-product-img">
                                <a href="productDetail.php?id=<?php echo $each['id'] ?>">
                                    <img src="<?php echo $each['img'] ?>" alt="">
                                </a>
                                <div class="home-product-hover">
                                    <a href="productDetail.php?id=<?php echo $each['id'] ?>">
                                        <div class="product-note">
                                        Click để xem chi tiết
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <h3 class="home-product-name">  
                            <?php echo $each['name'] ?>
                            </h3>
                            <div class="home-product-info">
                                <del><?php echo number_format($each['price'])?>đ</del>
                                <br>
                                <span class="home-product-price"><?php echo  number_format($each['price_sale'])?>đ</span>
                            </div>
                            <div class="home-product-percent">-<?php echo 100-ceil(($each['price_sale']/$each['price'])*100)  ?>%</div>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
                <div class="pagination">
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