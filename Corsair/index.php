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

    <title>Document</title>
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
        <div class="slide">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
                <div class="carousel-indicators" style="margin: 0 auto; width:40%; padding-bottom:8px;">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" style="width: 33.333333%;;" class=" active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" style="width: 33.333333%;"  aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" style="width: 33.333333%;"  aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner"  >
                    <div class="carousel-item active">
                    <img src="https://cwsmgmt.corsair.com/hybris/homepage/images/hero-banner/hp-hero-k100-gold.jpg" class="slide-img" alt="..." >
                    <div class="slide-content ">
                        <h1>  K100 RGB GOLD </h1>
                        <p>Combines stunning gold-anodized dual-tone aluminum design, per-key RGB lighting with powerful CORSAIR AXON Hyper-Processing Technology, and CORSAIR OPX RGB keyswitches.  </p>
                        <button>
                            SHOP NOW
                        </button>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <video autoplay loop muted poster="http://cwsmgmt.corsair.com/hybris/homepage/images/hero-banner/hp-hero-virtuoso-mobile.jpg" class="slide-img">
                            <source src="http://cwsmgmt.corsair.com/hybris/homepage/videos/hp-hero-virtuoso.mp4">
                    </video>
                    <div class="slide-content">
                        <h1>VIRTUOSO SERIES</h1>
                        <p>Incredible Sound, Impeccable Clarity</p>
                        <button>
                            LEARN MORE
                        </button>
                    </div>
                    </div>
                    <div class="carousel-item">
                        <video autoplay loop muted poster="http://cwsmgmt.corsair.com/hybris/homepage/images/hero-banner/hp_banner_esports_2x.jpg" class="slide-img">
                            <source src="//cwsmgmt.corsair.com/landing/esports/assets/videos/Corsair_Esports_Trailer.mp4">
                        </video>
                    <div class="slide-content">
                        <h1>A LEGACY OF EXCELLENCE</h1>
                        <p>Esports champions know what gear to use.</p>
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
                    <div class="product-container">
                            <h1> EXPLORE PRODUCTS </h1>
                            <div class=" list-products">
                                <div class="grid">
                                 <div class="grid__row">
                                    <div class="grid__column">
                                        <!-- san pham -->
                                        <div class="product__item">
                                            <a href="keyboard.php">
                                                <div class="product__item--thumb">
                                                    <img src="https://cwsmgmt.corsair.com/landing/home/images/explore-keyboards.png" alt="">
                                                </div>
                                                <div class="product__item--name">
                                                    KEYBOARDS
                                                </div>
                                            </a>
                                        </div>       
                                    </div>
                                    <div class="grid__column">
                                        <!-- san pham -->
                                        <div class="product__item">
                                            <a href="case.php">
                                                <div class="product__item--thumb">
                                                    <img src="https://cwsmgmt.corsair.com/landing/home/images/explore-cases.png" alt="">
                                                </div>
                                                <div class="product__item--name">
                                                    CASES
                                                </div>
                                            </a>
                                        </div>       
                                    </div>
                                    <div class="grid__column">
                                        <!-- san pham -->
                                        <div class="product__item">
                                            <a href="headset.php">
                                                <div class="product__item--thumb">
                                                    <img src="https://cwsmgmt.corsair.com/landing/home/images/explore-headsets.png" alt="">
                                                </div>
                                                <div class="product__item--name">
                                                    HEADSETS
                                                </div>
                                            </a>
                                        </div>       
                                    </div>
                                    <div class="grid__column">
                                        <!-- san pham -->
                                        <div class="product__item">
                                            <a href="mice.php">
                                                <div class="product__item--thumb">
                                                    <img src="https://cwsmgmt.corsair.com/landing/home/images/explore-mice.png" alt="">
                                                </div>
                                                <div class="product__item--name">
                                                    MICES
                                                </div>
                                            </a>
                                        </div>       
                                    </div>
                                    <div class="grid__column">
                                        <!-- san pham -->
                                        <div class="product__item">
                                            <a href="monitor.php">
                                                <div class="product__item--thumb">
                                                    <img src="https://cwsmgmt.corsair.com/content/images/header/explore-monitors.png" alt="">
                                                </div>
                                                <div class="product__item--name">
                                                    MONITORS
                                                </div>
                                            </a>
                                        </div>       
                                    </div>
                                    <div class="grid__column">
                                        <!-- san pham -->
                                        <div class="product__item">
                                            <a href="chair.php">
                                                <div class="product__item--thumb">
                                                    <img src="https://cwsmgmt.corsair.com/landing/home/images/explore-gaming-chairs.png" alt="">
                                                </div>
                                                <div class="product__item--name">
                                                    CHAIRS
                                                </div>
                                            </a>
                                        </div>       
                                    </div>
                                    
                                    </div>
                                </div>
                                
                                    
                                    
                            </div>
                    </div>
                
               
        </div>
        <div class="homepage-content">
            <div class="with-constraint">
                <div class="content-group-1">
                    <a href="" class="content-container" style="background: url('//cwsmgmt.corsair.com/hybris/homepage/images/cia/cia_upgrade_szn_lg.jpg'); background-position:35% center; background-size:cover;">
                        <div class="negative-margin-container">
                            <h1>IT'S UPGRADE SEASON</h1>
                            <p class="content-paragraph">
                            The latest generation of hardware is stronger and faster than ever.
                            </p>
                            <div class="clickthrough">
                                <p class="text-link">LEARN MORE</p>
                                <img src="https://cwsmgmt.corsair.com/landing/hot-new-products/right-chevron.svg" alt="" class="right-chevron">
                            </div>
                        </div>
                    </a>
                    <a href="" class="content-container" style="background: url('https://cwsmgmt.corsair.com/hybris/homepage/images/cia/cia_gaming_lg.jpg'); background-position:35% center; background-size:cover;">
                        <div class="negative-margin-container">
                                <h1>GAME WITH CORSAIR</h1>
                                <p class="content-paragraph">
                                Meet our partners and discover how CORSAIR helps you do your thing.
                                </p>
                                <div class="clickthrough">
                                    <p class="text-link">LEARN MORE</p>
                                    <img src="https://cwsmgmt.corsair.com/landing/hot-new-products/right-chevron.svg" alt="" class="right-chevron">
                                </div>
                            </div>
                    </a>
                </div>
                <div class="content-group-2">
                        <div class="banner-container">
                            <img src="https://cwsmgmt.corsair.com/landing/tech-innovation/image/iCUE-logo-black-bg.png" alt="">
                            <div class="banner-content">
                                    <h1> UNITE YOUR SETUP </h1>
                                    <p class="banner-paragraph">
                                    Turn your entire setup into a cohesive, fully immersive ecosystem with intuitive control. 
                                    </p>
                                    <div class="clickthrough">
                                         <p class="text-link"> SHOP ALL iCUE PRODUCTS </p>
                                        <img src="https://cwsmgmt.corsair.com/landing/hot-new-products/right-chevron.svg" alt="" class="right-chevron">
                                     </div>
                                    
                            </div>
                        </div>
                        <div class="banner-video">
                            <video autoplay loop muted>
                                <source src=" https://cwsmgmt.corsair.com/pdp/k65-rgb-mini/assets/videos/Corsair_iCue_Room_Explore.mp4">
                            </video>
                        </div>
                </div>
                <div class="content-group-3">
                        <div class="content-group-4">
                            <a href="" class="content-container-4" style="background: url('https://cwsmgmt.corsair.com/hybris/homepage/images/cia/cia-dyt-loserfruit.png'); background-position:35% center; background-size:cover;">
                                <div class="negative-margin-container">
                                    <h1>DO YOUR THING</h1>
                                    <p class="content-paragraph">
                                    Next-Level gaming setups by next-level gamers.
                                    </p>
                                    <div class="clickthrough">
                                        <p class="text-link">LEARN MORE</p>
                                        <img src="https://cwsmgmt.corsair.com/landing/hot-new-products/right-chevron.svg" alt="" class="right-chevron">
                                    </div>
                                </div>
                            </a>
                            <a href="" class="content-container-4" style="background: url('https://cwsmgmt.corsair.com/hybris/homepage/images/cia/cia_elgato_facecam_sm.jpg'); background-position:35% center; background-size:cover;">
                                <div class="negative-margin-container">
                                    <h1>ELGATO FACECAM</h1>
                                    <p class="content-paragraph">
                                    Perfectly engineered to make you look amazing.
                                    </p>
                                    <div class="clickthrough">
                                        <p class="text-link">LEARN MORE</p>
                                        <img src="https://cwsmgmt.corsair.com/landing/hot-new-products/right-chevron.svg" alt="" class="right-chevron">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="" class="content-container mr0" style="background: url('https://cwsmgmt.corsair.com/hybris/homepage/images/cia/cia-5000x-ql-edition.jpg'); background-position:35% center; background-size:cover;">
                            <div class="negative-margin-container">
                                <h1>5000X QL EDITION</h1>
                                <p class="content-paragraph">
                                For a crystal-clear build that keeps its cool..
                                </p>
                                <div class="clickthrough">
                                    <p class="text-link">SHOP NOW</p>
                                    <img src="https://cwsmgmt.corsair.com/landing/hot-new-products/right-chevron.svg" alt="" class="right-chevron">
                                </div>
                            </div>
                        </a>

                </div>
                <div class="content-group-5">
                     <a href="" class="content-container-5" style="background: url('https://cwsmgmt.corsair.com/pdp/service-skus/gamer-sensei/images/gamersensei-tier3.jpg'); background-position:35% center; background-size:cover;">
                        <div class="negative-margin-container">
                            <h1> GAMER SENSEI </h1>
                            <div class="clickthrough center">
                                <p class="text-link"> FIND COACHING </p>
                                 <img src="https://cwsmgmt.corsair.com/landing/hot-new-products/right-chevron.svg" alt="" class="right-chevron">
                             </div>
                        </div>
                     </a>
                     <a href="" class="content-container-5 mlr8" style="background: url('https://www.elgato.com/sites/default/files/2021-07/sd-mk2-d-gallery_desktop_06.jpg'); background-position:35% center; background-size:cover;">
                        <div class="negative-margin-container">
                            <h1> ELGATO </h1>
                            <div class="clickthrough center">
                                <p class="text-link"> EVOLVE YOUR CONTENT </p>
                                 <img src="https://cwsmgmt.corsair.com/landing/hot-new-products/right-chevron.svg" alt="" class="right-chevron">
                             </div>
                        </div>
                     </a>
                     <a href="" class="content-container-5" style="background: url('https://cwsmgmt.corsair.com/hybris/homepage/images/footer_banners_dreamhack_trophy.jpg'); background-position:35% center; background-size:cover;">
                        <div class="negative-margin-container">
                            <h1>CORSAIR ESPORTS</h1>
                            <div class="clickthrough center">
                                <p class="text-link">LEARN MORE</p>
                                 <img src="https://cwsmgmt.corsair.com/landing/hot-new-products/right-chevron.svg" alt="" class="right-chevron">
                             </div>
                        </div>
                     </a>
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