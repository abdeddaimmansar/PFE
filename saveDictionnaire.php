<?php
if(isset($_POST["ajout"])){
		
	
	$id_Vol = $_POST["id_dic"];
	$titre = $_POST["tit_dic"];
	$image = "assets/upload/";
	$file_name = $_FILES["image"]["name"];
	$image = "assets/upload/".$file_name;
	$file_tmp = $_FILES["image"]["tmp_name"];
	move_uploaded_file($file_tmp,$image);
	$auteur = $_POST["aut_dic"];
	$editeur = $_POST["ed_dic"];
	$emplace = $_POST["emp_dic"];
	$statut = $_POST["stat_dic"];
	$lang = $_POST["lang"];

	
	if( empty($titre)|| empty($image)|| empty($auteur) || empty($editeur) || empty($emplace)
	    || empty($statut) || empty($lang) ){
		header('location:add-dictionnaire.php?empty');
	}else{
		include("Volume.php");
		$en= new Dictionnaire($id_Vol,$titre,$image,$auteur,$editeur,$emplace,$statut,$lang);
		$en->addtodata();
		header("location:dictionnaire.php");

	}
	
}

?>
