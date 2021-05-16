<?php
 if(isset($_GET['id']))
 {
   $cne=$_GET['id'];
   include('conn.php');
   $con=new conn();
   $con->supprimerEtudiant($cne);
   header("location:students.php");

 }
   else {
      echo "error";
   }

?>
