 <?php

if (isset($_POST['borrowStudent'])) {

          $id=$_POST["id"];

          $cin=$_POST["cin"];
          $duree=$_POST["duree"];
          include 'Adherent.php';
          $student = new Etudiant();
          $student->emprunterEtu($cin,$id,$duree);
          header('location: add-emprunteur.php');

}
else if(isset($_POST['borrowTeacher'])) {
  $id=$_POST["id"];

  $cin=$_POST["cin"];
  $duree=$_POST["duree"];
  include 'Adherent.php';
  $student = new Enseignant();
  $student->emprunterTea($cin,$id,$duree);
  header('location: add-emprunteur.php');

}


  ?>
