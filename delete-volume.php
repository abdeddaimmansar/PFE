<?php
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
 if(isset($_GET['id_Cat']))
 {
   $id=$_GET['id_Cat'];
   include('conn.php');
   $con=new conn();
   $con->supprimerCategorie($id);
   header("location:categorie.php");

 }
   else {
      echo "error";
   }

?>
