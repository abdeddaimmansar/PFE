<?php
	if(!isset($_POST["save"])){
		header("location:add-categorie.php");
		die();
	}
    $id_cat=$_POST["txtid"];
	$liblecat=$_POST["txtlib"];
	

	if( empty($id_cat)|| empty($liblecat)){
		header('location:add-categorie.php?empty');
	}else{
		include("Libelle.php");
		$cat=new Libelle($id_cat,$liblecat);
		$cat->addtodata();
		header("location:categorie.php");
	}


?>