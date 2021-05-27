
<?php
     $bdd = new PDO('mysql:host=127.0.0.1;dbname=biblio;charset=utf8','root','');
      $sql = "SELECT id_cat, liblecat, image FROM categorie ORDER BY liblecat";
      
      try{
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

      }catch(Exception $ex){
            echo ($ex -> getMessage());
      }
      

?> 

<?php
include_once 'nav.php';
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

    <div class="row cards d-flex justify-content-around " > 
       
        <?php
            foreach ($result as $output ) {?>
                <div  class="card col-4 col-md-3  ">
                <?php echo '<a href="listeVolumes.php?categorie=' . $output['id_cat'] . '">'; ?>
                        <div class="car">
                            <img src="/Admin/<?php echo $output["image"];?>" class="card-img-top " alt="..." height="250px" width="100px">
                            <div class="text-center "> 
                            
                                <h3 class="text-center mt-3" ><?php echo $output["liblecat"];?> </h3>
                                
                            </div>
                        
                        </div>
                    </a>
                </div>
           
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
<script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Slimscroll JS -->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Chart JS -->
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<!-- Custom JS -->
<script  src="assets/js/script.js"></script>

</body>
</html>