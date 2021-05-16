<?php
 session_start();
 if(isset($_POST['update']))  {
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
   $nbr_emprunt = $_POST["nbr_emprunt"];
    $filename = $_FILES["photo"]["name"];
    if(!empty($filename)) {


     //  $filename = $_FILES["photo"]["name"];
      $tempname = $_FILES["photo"]["tmp_name"];
      $folder = "assets/img/profiles/".$filename;
     move_uploaded_file($tempname,$folder);
     




  }
   else {



    $folder = $_SESSION['userimage'];
    echo $folder;
  }

}
 include("Adherent.php");

  $student = new Etudiant();
  $student->newEntry($id_Adh,$nom,$prenom,$folder,$depar,$tele,$email,$nbr_emprunt,$cne,$filiere,$annee);
  $student->toUpdate();
  header('Location: students.php');







 ?>
