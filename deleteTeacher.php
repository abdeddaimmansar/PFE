<?php
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
 if(isset($_GET['cin']))
 {
   $cne=$_GET['cin'];
   include('conn.php');
   $con=new conn();
   $con->supprimerEtudiant($cne);
   header("location:teachers.php");

 }
   else {
      echo "error";
   }

?>
