<?php

	if(!isset($_POST["ajouter"])){
		header("location: add-student.php");
		die();
	}
	try{

	  $nom=$_POST["nom"];
	  $prenom=$_POST["prenom"];
	  $cne=$_POST["cne"];


    $id_Adh = $_POST["id"];
    $depar=$_POST["depar"];
    $tele=$_POST["tele"];
    $email=$_POST["email"];
    $annee=$_POST["annee"];
    $password=$_POST["password"];
    $username=$_POST["username"];
    $filiere=$_POST["filiere"];
    $nbr_emprunt = 1;
		$filename = $_FILES["photo"]["name"];
		$tempname = $_FILES["photo"]["tmp_name"];
		$folder = "assets/img/profiles/".$filename;
	 move_uploaded_file($tempname,$folder);
 if( empty($nom)|| empty($prenom) || empty($folder)|| empty($depar) || empty($tele)
		 || empty($email) || empty($nbr_emprunt)){
	 header('location:add-student.php?empty');
 }else{
	 include("Adherent.php");
	 $en=new Etudiant($id_Adh,$nom,$prenom,$folder,$depar,$tele,$email,$nbr_emprunt,$cne,$filiere,$annee);
	 $en->addtodata();
	 header("location:students.php");
}}
  catch(Exception $e)
  {
	  echo $e->getMessage();
  }





?>
