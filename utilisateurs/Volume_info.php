<style>
@import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");$main-green: #79dd09 !default;$main-green-rgb-015: rgba(121, 221, 9, 0.1) !default;$main-yellow: #bdbb49 !default;$main-yellow-rgb-015: rgba(189, 187, 73, 0.1) !default;$main-red: #bd150b !default;$main-red-rgb-015: rgba(189, 21, 11, 0.1) !default;$main-blue: #0076bd !default;$main-blue-rgb-015: rgba(0, 118, 189, 0.1) !default;
.dark {	background: #110f16;}
.light {	background: #f3f5f7;}
a, a:hover {	text-decoration: none	transition: color 0.3s ease-in-out;}
#pageHeaderTitle {	margin: 2rem 0;	text-transform: uppercase;	text-align: center;	font-size: 2.5rem;}
@media screen and (min-width: 1024px){.postcard__text { width:65%;padding: 2rem 3.5rem; }		
.postcard__text:before { content: ""; position: absolute; display: block;  top: -20%; height: 130%; width: 55px; 	
.postcard.dark {.postcard__text:before {background: #18151f; } }
.postcard.light {.postcard__text:before {background: #e1e5ea;} }
}

.postcard__img {  width: 35%; position: relative;border-right-style: ridge;}
.postcard__img_link {  display: contents; }
.postcard{ height: 430; padding:5px; display: flex; border:double;}
.postcard .postcard__tagbox .red.play:hover {	background: $main-red;}
.red .postcard__title:hover {	color: $main-red;}
.red .postcard__bar {padding-left:2rem;	background-color: $main-red;}
.postcard__preview-txt { padding:30px; overflow: hidden; text-overflow: ellipsis; text-align: justify; height: 100%; }
.postcard__preview-txt  h4{ padding-bottom:9px; }
.red::before {	background-image: linear-gradient(-30deg, $main-red-rgb-015, transparent 50%);}
.red:nth-child(2n)::before {	background-image: linear-gradient(30deg, $main-red-rgb-015, transparent 50%)}
@media screen and (min-width: 769px) {.red::before {background-image: linear-gradient(-80deg, $main-red-rgb-015, transparent 50%);}.red:nth-child(2n)::before {background-image: linear-gradient(80deg, $main-red-rgb-015, transparent 50%);}
}
</style>

<?php
include_once 'nav.php';
?>

<?php
    
    include('conn.php');
    $con=new conn();
    $result = $con->listeVolume();
?>


<div class="page-wrapper">
<div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Information sur le Volume</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Main menu</a></li>
									<li class="breadcrumb-item active">Catégories</li>
								</ul>
							</div>
						</div>
					</div>

<main class="container py-4">
    <article class="postcard light red">
    <?php
              
              foreach ($result as $output ) {?>
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="/Admin/<?php echo $output["image"];?>" alt="Image Title" />	
			</a>
			<div class="postcard__text t-dark" >
				<h1 class="postcard__title red" style="color: rgb(5, 16, 82);text-decoration: underline;"><?php echo $output["titre"];?> :</h1>
	
				<div class="postcard__preview-txt">
                <h4>Auteur : <?php echo $output["auteur"];?> </h4>
                <h4>Editeur : <?php echo $output["editeur"];?></h4>
                <h4>Emplacement : <?php echo $output["emplacement"];?></h4>
                <h4>Status : <button class="btn btn-danger" disabled><?php echo $output["status"];?></button></h4>
				<ul class="postcard__tagbox" >
                
					<li class="tag__item play red" style ="padding: 25px 0px 0px 270px">
						<button class=" btn btn-primary " style=" text-align:center;width:150px;height:50px;" type="submit" name="emprunt" ><i class="fas fa-play mr-2"></i>Emprunt</button>
					</li>
				</ul>
			</div>
            <?php } 
              ?>
		</article>
         </main>
<!-- Footer -->
<footer>
    <p>École Supérieure de Technologie - SAFI.</p>
</footer>
<!-- /Footer -->

</div>
<!-- /Page Wrapper -->
</div>

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

</body>
</html>