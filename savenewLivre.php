<?php
if(isset($_POST["save"])){
		
	
	$id_Vol = $_POST["id_Vol"];
	$titre = $_POST["titre"];
	$image = "assets/upload/";
	$file_name = $_FILES["image"]["name"];
	$image = "assets/upload/".$file_name;
	$file_tmp = $_FILES["image"]["tmp_name"];
	move_uploaded_file($file_tmp,$image);
	$auteur = $_POST["auteur"];
	$editeur = $_POST["editeur"];
	$emplace = $_POST["emplace"];
	$statut = $_POST["statut"];

	
	if( empty($titre)|| empty($image)|| empty($auteur) || empty($editeur) || empty($emplace)
	    || empty($statut) ){
		header('location:add-livre.php?empty');
	}else{
		include("Volume.php");
		$en= new Livre($id_Vol,$titre,$image,$auteur,$editeur,$emplace,$statut);
		$en->addtodata();
		header("location:livres.php");

	}
	
}

?>
