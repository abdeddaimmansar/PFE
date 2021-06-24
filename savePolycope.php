<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
if(isset($_POST["ajout"])||isset($_POST["updatepolycope"])){

 try {

    	$filename = $_FILES["image"]["name"];
   if (!empty($filename)) {
     $tempname = $_FILES["image"]["tmp_name"];
     $folder = "assets/img/".$filename;
     move_uploaded_file($tempname,$folder);
   }
   else {
     $folder = $_SESSION['image_poly'];
   }
     $id_cat = $_SESSION[$_POST["cat"]];
  $titre = $_POST["titre"];
	$auteur = $_POST["auteur"];
	$editeur = $_POST["editeur"];
	$emplace = $_POST["emplace"];
	$statut = $_POST["status"];
  $id_p = $_SESSION['id_p'];


if(empty($id_cat)||empty($titre)|| empty($folder)|| empty($auteur) || empty($editeur) || empty($emplace)
	    || empty($statut)||empty($folder)){
        echo "string_".$_POST["titre"];
        echo "<br>".$_POST["auteur"];
        echo "<br>".$_POST["editeur"];
        echo "<br>empty".$_POST["emplace"];
        echo "<br>".$_POST["status"];
        echo "<br>".$_SESSION[$_POST["cat"]]['idcat'];
//		header('location:add-polycope.php?empty');
	}else{
		 echo "you're here";
		include("Volume.php");
    $en = new polycope();
		$en->newEntry($titre,$folder,$auteur,$editeur,$emplace,$statut,$id_cat);
    if(isset($_POST["ajout"]))
    {
      $en->addtodata();
  	header("location:polycopes.php");

    }
     elseif (isset($_POST["updatepolycope"])) {
         $en->updatepolycope($id_p);
         header("location: polycopes.php");

     }
	}
}catch (Exception $e) {
		echo $e->getMessage();
}

}

?>
