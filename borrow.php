 <?php
 session_start();
 if($_SESSION['loggedin']== false)
 {
   header("location: logout.php");
 }

if (isset($_POST['borrowStudent']) || isset($_POST['upempruntEtu'])){

          $id=$_POST["id"];
          $cin=$_POST["cin"];
          $duree=$_POST["duree"];
          $date = $_POST["date_emp"];
          include 'Adherent.php';
         $student = new Etudiant();
          if(isset($_POST['borrowStudent']))
          {
              $student->emprunterEtu($cin,$id,$duree);
                header('location: add-emprunteur.php');
          }
          else if (isset($_POST['upempruntEtu'])){
                $student->updateEmprunt($cin,$id,$duree,$date);
                  header('location: emprunte-etudiants.php');
          }
        }

else if(isset($_POST['borrowTeacher'])){
  $id=$_POST["id"];

  $cin=$_POST["cin"];
  $duree=$_POST["duree"];
  include 'Adherent.php';
  $student = new Enseignant();
  $student->emprunterTea($cin,$id,$duree);
  header('location: add-emprunteur.php');
}
else {
  if(isset($_GET["deletEmpEtu"]))
  {
     include_once 'conn.php';
     $conn = new conn();
     $conn->deleteEmpEtudiant($_GET["deletEmpEtu"]);
     header("location: emprunte-etudiants.php");
  }

    }


  ?>
