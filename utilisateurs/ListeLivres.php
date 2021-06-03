<style>
h2 { color: #0a4870; font-weight: 500;}
.cards ul { display: flex; flex-wrap: wrap; list-style: none; padding: 0; width:30%;height:25%;}
ul .booking-card { position: relative; width: 300px;height:400px; display: flex; flex: 0 0 300px; flex-direction: column;border: groove; margin: 20px; margin-bottom: 30px; -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px; overflow: hidden;  background-size: cover; text-align: center; color: #0a4870; transition: .3s;}
ul .booking-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(10, 72, 112, 0); transition: .3s;}
ul .booking-card .book-container { height: 200px;}
ul .booking-card .book-container .content { position: relative; opacity: 0; display: flex; align-items: center; justify-content: center; height: 100%; width: 100%; transform: translateY(-200px); transition: .3s;}
ul .booking-card .book-container .content .btn { border: 3px solid white; padding: 10px 15px; background: none; text-transform: uppercase; font-weight: bold; font-size: 1.3em; color: white; cursor: pointer; transition: .3s;}
ul .booking-card .book-container .content .btn:hover { background: white; border: 0px solid white; color: #0a4870;}
ul .booking-card .informations-container { flex: 0.3 0.4 auto; height:25px; padding: 2px; background: rgba(76, 67, 67, 0.41);  transform: translateY(20px); transition: .3s;}
ul .booking-card .informations-container .title { position: relative; padding-bottom: 10px;color:black; margin-bottom: 10px; font-weight: bold; }
ul .booking-card .informations-container .title::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px; width: 50px; margin: auto; background: black;}

ul .booking-card:hover::before { background: rgba(10, 72, 112, 0.6);}
ul .booking-card:hover .book-container .content { opacity: 1; transform: translateY(0px);}
ul .booking-card:hover .informations-container { transform: translateY(150px);}
@media (max-width: 768px) {
  ul .booking-card::before {  background: rgba(10, 72, 112, 0.6); }
  ul .booking-card .book-container .content {  opacity: 1;  transform: translateY(0px);}
  ul .booking-card .informations-container { transform: translateY(0px);}
}
</style>


<?php
include_once 'nav.php';
?>

<?php
    
   include('conn.php');
   $con=new conn();
   $result = $con->listeLivres();
   

 

?>


<!-- Page Wrapper -->
<div class="page-wrapper">

<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title text-center">Welcome Admin!</h3>
               
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="row cards d-flex justify-content-around ">
                <?php
                        foreach ($result as $output ) {
                            ?>
                    <ul  >
                        <li class="booking-card" style="background-image: url(/Admin/<?php echo $output["image"];?>);">
                            <div class="book-container">
                                <div class="content">
                                    <a href="ListeLivres.php?categorie=<?php echo $output["titre"];?>">
                                    <button class="btn">Voir tout</button></a>
                                </div>
                            </div>
                            <div class="informations-container">
                                <h2 class="title"><?php echo $output["STATUS"];?> </h2>
                               
                            </div>
                        </li>
                    </ul>
                <?php } 
                         
                            ?>
            </div> 

   <!-- <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 50px; height: 50px;">
                    <div class="bestsellers-item-wrap">
                        <a id="mainContentRegion_bestSelling_rptBestSellers_lnkBestItem_1" class="bestsellers-item" href="/browse/Books/9780735211292" tabindex="0">
                            <div class="bestsellers-item-cover-wrap">
                                <img id="mainContentRegion_bestSelling_rptBestSellers_imgBestItem_1" class="bestsellers-item-cover" src="/utilisateurs/assets/img/im1.jpg" alt="Product image">
                            </div>
                            <div class="bestsellers-item-details">
                                <span id="mainContentRegion_bestSelling_rptBestSellers_lnkBestItemTitle_1" class="bestsellers-item-title">Atomic Habits An Easy and P...</span>
                            </div>
                        </a>
                    </div>
                </div> -->

    <!-- <div class="row cards d-flex justify-content-around ">
        
        <div class="card col-12 col-md-3 p-0" style=" background: linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)),url(/utilisateurs/assets/img/im1.jpg); height:250px;  background-size:cover;position:relative;">
            <img src="assets/img/im1.jpg" class="card-img-top " alt="..." height="100%"> -->
            <!-- <h3 class="text-center" style="position:absolute; top:40%; left:40% ; color:white;">titre</h3>
            
        </div>
        <div class="card col-12 col-md-3 p-0" style="background: linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)),url(/utilisateurs/assets/img/im2.jpg);height:250px;background-size:cover;position:relative;"> -->
            <!-- <img src="assets/img/im2.jpg" class="card-img-top " alt="..." height="100%"> -->
            <!-- <h3 class="text-center" style="position:absolute; top:40%; left:40% ; color:white;">titre</h3>
        </div>
        <div class="card col-12 col-md-3 p-0" style="background: linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)),url(/utilisateurs/assets/img/im3.jpg);height:250px;background-size:cover;position:relative;"> -->
            <!-- <img src="assets/img/im3.jpg" class="card-img-top " alt="..." height="100%"> -->
            <!-- <h3 class="text-center" style="position:absolute; top:40%; left:40% ; color:white;">titre</h3>
        </div>
    
    </div>
</div>
    -->


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
