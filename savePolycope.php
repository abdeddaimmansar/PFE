<?php
if(isset($_POST["ajout"])){
		
	
	$id_Vol = $_POST["id_pol"];
	$titre = $_POST["tit_pol"];
	$image = "assets/upload/";
	$file_name = $_FILES["image"]["name"];
	$image = "assets/upload/".$file_name;
	$file_tmp = $_FILES["image"]["tmp_name"];
	move_uploaded_file($file_tmp,$image);
	$auteur = $_POST["aut_pol"];
	$editeur = $_POST["ed_pol"];
	$emplace = $_POST["emp_pol"];
	$statut = $_POST["stat_pol"];

	
	if( empty($titre)|| empty($image)|| empty($auteur) || empty($editeur) || empty($emplace)
	    || empty($statut) ){
		header('location:add-polycope.php?empty');
	}else{
		include("Volume.php");
		$en= new Polycope($id_Vol,$titre,$image,$auteur,$editeur,$emplace,$statut);
		$en->addtodata();
		header("location:polycopes.php");

	}
	
}

?>
