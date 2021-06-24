<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
	if(isset($_POST["save"]) || isset($_POST["update"])){

	     $liblecat=$_POST["txtlib"];
			 $filename = $_FILES["photo"]["name"];
       if(empty($filename))
       {
         $folder = $_SESSION["imagecat"];
       }
       else{
         $tempname = $_FILES["photo"]["tmp_name"];
        $folder = "assets/img/profiles/".$filename;
        move_uploaded_file($tempname,$folder);

           }



	if(empty($folder)|| empty($liblecat)){
		header('location:add-categorie.php?empty');
	}else{
	   	include("Libelle.php");
		  $cat = new Libelle();
      $cat->newEntry($folder,$liblecat);
      if(isset($_POST["save"]))
      {

       $cat->addtodata();
      }
      else if (ISSET($_POST["update"])) {
          $cat->updateCat($_SESSION['idcat']);
      }


	header('location: categorie.php');
	}

}
?>
