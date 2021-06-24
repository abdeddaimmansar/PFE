<style>
h2 { color: #0a4870; font-weight: 500;}
.cards ul { display: flex; flex-wrap: wrap; list-style: none; padding: 0; width:30%;height:25%;}
ul .booking-card { position: relative; width: 300px;height:300px; display: flex; flex: 0 0 300px; flex-direction: column;border: groove; margin: 20px; margin-bottom: 30px; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px; overflow: hidden;  background-size: cover; text-align: center; color: #0a4870; transition: .3s;}
ul .booking-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(10, 72, 112, 0); transition: .3s;}
ul .booking-card .book-container { height: 200px;}
ul .booking-card .book-container .content { position: relative; opacity: 0; display: flex; align-items: center; justify-content: center; height: 100%; width: 100%; transform: translateY(-200px); transition: .3s;}
ul .booking-card .book-container .content .btn { border: 3px solid white; padding: 10px 15px; background: none; font-size: 12px;   color: white; cursor: pointer; transition: .3s;}
ul .booking-card .book-container .content .btn:hover { background: white; border: 0px solid white; color: #0a4870;}
ul .booking-card .informations-container { flex: 0.5 0.4 auto; height:25px; padding: 2px; background: rgba(76, 67, 67, 0.41);   transition: .3s;}
ul .booking-card .informations-container .title { position: relative; padding-bottom: 10px;color:black; margin-bottom: 10px; font-weight: bold; }
ul .booking-card .informations-container .title::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px; width: 50px; margin: auto; background: black;}

ul .booking-card:hover::before { background: rgba(10, 72, 112, 0.6);}
ul .booking-card:hover .book-container .content { opacity: 1; transform: translateY(0px);}
ul .booking-card:hover .informations-container { transform: translateY(10px);}
@media (max-width: 768px) {
  ul .booking-card::before {  background: rgba(10, 72, 112, 0.6); }
  ul .booking-card .book-container .content {  opacity: 1;  transform: translateY(0px);}
  ul .booking-card .informations-container { transform: translateY(0px);}
}
</style>


<?php

    include('conn.php');
    $con=new conn();
    $result = $con->listeLivres();
    $resultat = $con->listePolycope();




 ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Livres/Polycopes</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">categorie</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid" style=" text-align:center; justify-content:center;">
									<li class="nav-item" style="width:50%; border:outset; background-color: rgb(213, 213, 213); " >
										<a class="nav-link active"  data-toggle="tab" href="#livre_liste">Livres</a>
									</li>
									<li class="nav-item" style="width:50%; border:outset; background-color: rgb(213, 213, 213); " >
										<a class="nav-link"  data-toggle="tab" href="#polycope_liste">Polycope</a>
									</li>
								</ul>
							</div>
							<div class="tab-content profile-tab-cont">
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="livre_liste">
									<!-- Personal Details -->


									<div class="row">
                                        <div class="card" >
                                            <div class="row  d-flex justify-content-around ">
                                                <?php
                                                        foreach ($result as $output ) {
                                                            ?>
                                                    <ul  >
                                                        <li class="booking-card" style="background-image: url(/Admin/<?php echo $output["image"];?>);">
                                                            <div class="book-container">
                                                                <div class="content">
                                                                <a href="Volume_info.php?id_vol=<?php echo $output["id_vol"];?>">
                                                                    <button class="btn">Voir plus <br> d'Information</button></a>
                                                                </div>
                                                            </div>
                                                            <div class="informations-container">
                                                                <h2 class="title"><?php echo $output["titre"];?> </h2>

                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php }

                                                            ?>
                                            </div>
                                        </div>


                                     </div>

									<!-- /Personal Details -->
								</div>
								<!-- /Personal Details Tab -->
								<!-- Change Password Tab -->


								<div id="polycope_liste" class="tab-pane fade  ">
                                    <div class="row">
                                            <div class="card" >
                                                <div class="row  d-flex justify-content-around ">
                                                    <?php
                                                            foreach ($resultat as $output2 ) {
                                                                ?>
                                                        <ul  >
                                                            <li class="booking-card" style="background-image: url(/Admin/<?php echo $output2["image"];?>);">
                                                                <div class="book-container">
                                                                    <div class="content">
                                                                        <a href="Volume_info.php?id_vol=<?php echo $output2["id_vol"];?>">
                                                                        <button class="btn">Voir plus <br> d'Information</button></a>
                                                                    </div>
                                                                </div>
                                                                <div class="informations-container">
                                                                    <h2 class="title"><?php echo $output2["titre"];?></h2>

                                                                </div>
                                                            </li>
                                                        </ul>
                                                    <?php }

                                                                ?>
                                                </div>
                                            </div>
                                     </div>
								</div>
								<!-- /Change Password Tab -->
							</div>
						</div>
					</div>
				</div>
                <footer>
    <p>École Supérieure de Technologie - SAFI.</p>
</footer>
			</div>


      <div class="card-columns col-sm d-fle ">

         <?php foreach ($livres as $livre) { ?>
      <div class="card bg-primary flex-fill">
    <h2>Titre : <?php echo $livre["titre"]; ?></h2>
    <p>Auteur : <?php echo $livre["auteur"]; ?></p>
    <div class="card" style="width:400px">
    <img class="card-img-top" src="<?php echo $livre["image_v"]; ?>" alt="Card image" style="width:60%">
    <div class="card-body">
    <h4 class="card-title">Categorie : <?php echo $livre["liblecat"]; ?></h4>

    <?php if ($livre["status"]=="Available") {   $href ="newemprunter.php?idliv=".$livre["id_vol"];
    echo "  <div class='book-container'>

         <a href='".$href."' class='btn btn-primary'>Réserver</a>

     </div>";}
           else {
              echo "<a href='#' class='btn btn-primary '>Unavailable</a><br>";
             include_once("Adherent.php");
             $li = new Etudiant();
             $ens = new Enseignant();
             $isit = true;
             $emprunter =$li->GetEmprunt();
             $enseign = $ens->GetEmprunt();
              foreach ($emprunter as $emp ) {
                if($emp["id_vol"] == $livre["id_vol"])
                   { echo " Emprunte par : ".$emp["nom_Adh"];
                       echo "<br>Date reteur : ".$emp["dateRet"];
                         $isit = false;}
                       }
               if($isit)
               {
                 foreach ($enseign as $emp ) {
                   if($emp["id_vol"] == $livre["id_vol"])
                      { echo " Emprunte par : ".$emp["nom_Adh"];
                            echo "<br>Date reteur : ".$emp["dateRet"];
                            $isit = false;}
                          }
               }
           }

      ?>
    </div>
    </div>
    </div>
    <?php } ?>
    </div>




<!-- Footer -->

<!-- /Footer -->

</div>
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
