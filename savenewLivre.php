<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
if(isset($_POST["save"])||isset($_POST["updatelivre"])){
		$filename = $_FILES["image"]["name"];
	if (!empty($filename)) {
		$tempname = $_FILES["image"]["tmp_name"];
		$folder = "assets/img/".$filename;
		move_uploaded_file($tempname,$folder);
	}
	else {
		$folder = $_SESSION["image_v"];
	}

	$titre = $_POST["titre"];
	$titre = $_POST["titre"];
	$auteur = $_POST["auteur"];
	$editeur = $_POST["editeur"];
	$emplace = $_POST["emplace"];
	$statut = $_POST["status"];
	$id_cat = $_SESSION[$_POST["cat"]];
	$id_vol = $_SESSION['id_vol'];



	if( empty($titre)|| empty($folder)|| empty($auteur) || empty($editeur) || empty($emplace)
	    || empty($statut)||empty($folder)||empty($id_cat)){
				echo "string_".$_POST["titre"];
				echo "<br>".$_POST["auteur"];
				echo "<br>".$_POST["editeur"];
				echo "<br>".$_POST["emplace"];
				echo "<br>".$_POST["status"];
				echo "<br>".$_SESSION[$_POST["cat"]]." hh ".$id_cat;

	header('location:add-livre.php?empty');
	}else{
		include("Volume.php");
		$en = new Livre();
		$en->newEntry($titre,$folder,$auteur,$editeur,$emplace,$statut,$id_cat);
		if(isset($_POST["save"]))
		{
			 $en->addtodata();
			 echo "string";
		}
		else {
			echo "heheheh";
			$en->updatelivre($id_vol);
		}

 		header("location:livres.php");

	}

}

?>
