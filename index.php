<?php 
    include "dblink.php";
    $sql="SELECT * FROM news1";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>輔大資管系學會</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body style="background-image: url('images/bg.jpg');">
  
  <div class="site-wrap">

    

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
<div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="row align-items-center">
            <div class="col-1">
              <h2 class="mb-0 site-logo"><a href="index.php" class="font-weight-bold"><img src="images/logo.jpg" alt=""></a></h2>
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li class="active"><a href="index.php"><font size="5"><img src="images/home.png" alt="">Home</font></a></li>
                    <li><a href="attend1_nor.php"><font size="5"><img src="images/activity.png" alt="">活動報名</font></a></li>
                    <li><a href="news_nor.php"><font size="5"><img src="images/news.png" alt="">活動消息</font></a></li>
                    <li><a href="news1_nor.php"><font size="5"><img src="images/news.png" alt="">最新消息</font></a></li>
                    <?php session_start();
                          if(isset($_SESSION["ac_name_nor"])){
                    ?>
                    <li><a href="logout.php"><span class="d-inline-block p-3 bg-primary text-white btn btn-primary"><font size="5">登出</font></span></a></li>
                    <?php }
                    ?>
                    <?php if(!isset($_SESSION["ac_name_nor"])){
                    ?>
                    <li><a href="login.php"><span class="d-inline-block p-3 bg-primary text-white btn btn-primary"><font size="5">Log-In</font></span></a></li>
                    <?php }
                    ?>
                  </ul>
                </div>
              </nav>
            </div>
            <?php if(isset($_SESSION["ac_name_nor"])){ 
            ?>
            <div class="col-1">
              <font size="5" color="orange">歡迎 <?php echo $_SESSION["ac_name_nor"] ?></font>
            </div>
            <?php
                }
            ?>
          </div>
        </div>
      </div>
    </div>
  
    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/fjuim.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12">
              <h1 class="font-weight-bold text-uppercase">Welcome to visit us!</h1>
            </div>
          </div>
        </div>
      </div>  

      
    </div>

   <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="mb-2 font-secondary font-weight-bold"><font size="20" color="#ffb100">最新消息報你知!</font></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-13 nav-direction-white">
            <div class="nonloop-block-13 owl-carousel">
             <?php
                while($row = mysqli_fetch_array($result)){
             ?>
              <div class="media-image">
                <img src="<?php echo $row["picture"] ?>" alt="Image" class="img-fluid">
                <div class="media-image-body">
                    <p><?php echo $row["info"] ?></p>
                </div>
              </div>
              <?php
                }
              ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    
    
    
  

  
    

    

    

    <div class="site-section" style="background-image: url('images/topography.png'); background-attachment: fixed">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12" style="text-align:center">
            <font size="20" color="black"><b>學會大家長</b></font>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <img src="images/president.png" alt="Image" class="img-fluid rounded-circle w-26 mb-4">
            <h2 class="h5 ">吳冠宏</h2>
            <span class="d-block mb-4">系學會會長</span>
            <p class="font-weig mb-5 lead">資管三甲</p>
          </div>
          <div class="col-md-6 text-center">
            <img src="images/vice_president.jpg" alt="Image" class="img-fluid rounded-circle w-26 mb-4">
            <h2 class="h5">王玫鈞</h2>
            <span class="d-block mb-4">系學會副會長</span> 
            <p class="font-weig mb-5 lead">資管三甲</p>
          </div>
        </div>
      </div>  
    </div>
    
    

    

    <footer class="site-footer">
      <div class="container">
        

        <div class="row">
          <div class="col-md-6">
            <h3 class="footer-heading mb-4 text-white">學會位置</h3>
            <p>伯達樓一樓</p>
            <iframe width='320' height='180' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q=242新北市新莊區中正路510號&z=16&output=embed&t='></iframe>
          </div>
          <div class="col-md-4 ml-auto">
            <div class="row">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="attend1_nor.php">活動報名</a></li>
                    <li><a href="news_nor.php">最新消息</a></li>
                  </ul>
              </div>
              
            </div>
          </div>

          
          <div class="col-md-2">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="https://www.facebook.com/ILovefjuim123/" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="https://www.instagram.com/fjuim/?hl=zh-tw" class="p-2"><span class="icon-instagram"></span></a>

                </p>
              </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  </body>
</html>