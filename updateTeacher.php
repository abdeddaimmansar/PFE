<?php
 session_start();
 if($_SESSION['loggedin']== false)
 {
   header("location: logout.php");
 }
 if(isset($_POST['update']))  {

   $nom=$_POST["nom"];
   $prenom=$_POST["prenom"];

   $cin =$_POST["cin"];
   $depar=$_POST["depar"];
   $tele=$_POST["tele"];
   $email=$_POST["email"];


   $nbr_emprunt = $_POST["nbr_emprunt"];
    $filename = $_FILES["photo"]["name"];
    if(!empty($filename)) {


     //$filename = $_FILES["photo"]["name"];
      $tempname = $_FILES["photo"]["tmp_name"];
      $folder = "assets/img/profiles/".$filename;
     move_uploaded_file($tempname,$folder);

                         }
   else {
      $folder = $_SESSION['userimage'];

        }
        /*echo $id_Adh."<br>";
        echo $nom."<br>";
        echo $prenom."<br>";
        echo $folder."<br>";
        echo $depar."<br>";
        echo $tele."<br>";
        echo $nbr_emprunt."<br>";
        echo $email."<br>";*/

}
 include("Adherent.php");
  $student = new Enseignant();
  $student->newEntry($cin,$nom,$prenom,$folder,$depar,$tele,$email,$nbr_emprunt);
  echo "string";
  $student->toUpdate();
header('Location: teachers.php');







 ?>
