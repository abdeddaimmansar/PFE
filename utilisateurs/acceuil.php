<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/bib.css"/>
<link rel="stylesheet" href="assets/css/style1.css"/>
<link rel="stylesheet" href="assets/css/slick.css"/>
<link rel="stylesheet" href="assets/css/slick-theme.css"/>
<script type="text/javascript" src="assets/js/bib.js"></script>
<title>Acceuil</title>
<style type="text/css">
    

    .slider {
        height: 200px;
        width: 90%;
        margin:  auto;
        
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: red;
      weight: 20px;
      
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      
    }
    
    .slick-active {
        
    }

    .slick-current {
          }
  </style>
</head>


<body>
<header>
<?php
include_once 'nav.php';
?>
<div class="page-wrapper" style="background-color: rgb(230, 230, 230);">
    <div class="col-lg-12">
        <div class="tableau" >

            <div class="panel panel-default" style="margin-bottom:25px ;width:100% ;height:100% ;">

                  <div class="container" >
                      <div id="ninja-slider" >
                          <div class="slider-inner" >
                              <ul>
                                <li><img class="ns-img" src="assets/img/im1.jpg" ></li>
                                <li><img class="ns-img" src="assets/img/im2.jpg"></li>
                                <li><img class="ns-img" src="assets/img/im3.jpg"></li>

                              </ul>
                          </div>
                        </div>
                  </div>
                        <script type="text/javascript">
                        var tag = document.createElement('script');

                        tag.src = "https://www.youtube.com/player_api";
                        var firstScriptTag = document.getElementsByTagName('script')[0];
                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                        var player;

                        function onYouTubeIframeAPIReady() {
                        player = new YT.Player('ytplayer', {
                        events: {
                        'onReady': onPlayerReady
                        }
                        });
                        }

                        function onPlayerReady() {
                        player.playVideo();
                        // Mute!
                        player.mute();
                        }
                        </script>
              </div>
        </div>
    </div>

        <!-- /Footer -->



    <div class="slider_stick mt-md-5" >
        <div class="best_book d-flex justify-content-between mb-2">
            <h3 ><span class="Best font-weight-bold ml-4"> Bestselling books</span>
                </h3>      
            <a href="listecategories.php" class="nav-link mt-xs" style="margin-right:25px; text-decoration:underline;" >voir tout</a>
        </div>      
      
            <section class="regular slider">
            <div><a href="">
            <img src="/utilisateurs/assets/img/couvertures/Architecture.png" height="150px" width="95px"></a>
            </div>
            <div><a href="">
            <img src="/utilisateurs/assets/img/couvertures/C++.png" height="150px" widht="95px"></a>
            </div>
            <div><a href="">
            <img src="/utilisateurs/assets/img/couvertures/C.png" height="150px" widht="95px"></a>
            </div>
            <div><a href="">
            <img src="/utilisateurs/assets/img/couvertures/JAVA.png" height="150px" widht="95px"></a>
            </div>
            <div><a href="">
            <img src="/utilisateurs/assets/img/couvertures/MATH.jpg" height="150px" widht="95px"></a>
            </div>
            <div><a href="">
            <img src="/utilisateurs/assets/img/couvertures/Python.png" height="150px" widht="95px"></a>
            </div>
            <div><a href="">
            <img src="/utilisateurs/assets/img/couvertures/RI.png" height="150px" widht="95px"></a>
            </div>
            <div><a href="">
            <img src="/utilisateurs/assets/img/couvertures/Physic&Chimie.jpg" height="150px" widht="95px"></a>
            </div>
            <div><a href="">
            <img src="/utilisateurs/assets/img/couvertures/securite.png" height="150px" widht="95px"></a>
            </div>
        </section>
    </div>
    <br>
    <br>


<div class="separe" style=" height: 400px; ">



</div>




  <div id="top-footer " style="background-image: linear-gradient(0deg, gray, rgb(230, 230, 230)); height: 250px; ">
    <div class="container-fluid ">
      <div class="row ">
          <div class="col-md-7 contact" style="margin-top: 80px; ">
              <h3>Rester en contact</h3>
              <h4>École Supérieure de Technologie - SAFI</h4>
              <ul >
                      <li>
                          <i class="slicon-globe"></i>
                          <a href="http://ests.uca.ma" target="_blank">http://ests.uca.ma</a>
                      </li>
                      <li>
                          <i class="slicon-phone"></i>
                          <a href="tel:Mobile : " target="_blank">Mobile : </a>
                      </li>
                      <li>
                          <i class="slicon-envelope"></i>
                          <a href="mailto:contact.ests@uca.ma" target="_blank">contact.ests@uca.ma</a>
                      </li>
              </ul>
          </div>
    </div>
  </div>
</div>
<!-- /Page Wrapper -->

<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery-3.5.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Chart JS -->
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<!-- Custom JS -->
<script  src="assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="assets/js/slick.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$('.regular').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 3
});
</script>
</header>
</body>
</html>
