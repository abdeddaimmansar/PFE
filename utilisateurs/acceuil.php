
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bib.css"/>
<link rel="stylesheet" href="css/style.css"/>
<script type="text/javascript" src="js/bib.js"></script>
<title>Acceuil</title>
</head>


<body>
<header>
<?php
include_once 'nav.php';
?>

<div class="page-wrapper">
<div class="col-lg-12">
<div class="tableau">

<div class="panel panel-default">

<div class="container">
<div id="ninja-slider">
<div class="slider-inner">
<ul>
<li><img class="ns-img" src="img/im1.jpg"></li>
<li><img class="ns-img" src="img/im2.jpg"></li>
<li><img class="ns-img" src="img/im3.jpg"></li>

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

</div>
<!-- /Page Wrapper -->



</div>
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

</header>
</body>
</html>
