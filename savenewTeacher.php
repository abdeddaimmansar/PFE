<?php
	if(!isset($_POST["save"])){
		header("location:add-teacher.php");
		die();
	}
    $id_Adh=$_POST["txtid"];
	$nom_Adh=$_POST["txtNom"];
	$prenom=$_POST["txtPrenom"];
    //$image= $_FILES["photo"]["name"];
	//$dest="assets/img/profiles/".$nom_Adh;
	//$filename = $_FILES["uploadfile"]["name"];
	 //$tempname = $_FILES["photo"]["tmp_name"];
//	move_uploaded_file($image,$dest);
	$filename = $_FILES["photo"]["name"];
  $tempname = $_FILES["photo"]["tmp_name"];
  $folder = "assets/img/profiles/".$filename;
	move_uploaded_file($tempname,$folder);
	$depar=$_POST["seldep"];
    $tele=$_POST["tele"];
    $email=$_POST["email"];
	$nbr_emprunt=$_POST["nbr"];

	if( empty($nom_Adh)|| empty($prenom)|| empty($filename) || empty($depar) || empty($tele)
	    || empty($email) || empty($nbr_emprunt)){
		header('location:add-teacher.php?empty');
	}else{
		include("Adherent.php");
		$en=new Enseignant($id_Adh,$nom_Adh,$prenom,$folder,$depar,$tele,$email,$nbr_emprunt);
		$en->addtodata();
		header("location:teachers.php");

	}


?>
