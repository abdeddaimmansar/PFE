<?php
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
if (isset($_GET["id_vol"])) {
    $id = $_GET["id_vol"];
    include_once 'conn.php';
    $conn  = new conn();
    $conn->deletelivre($id);
    header("location: livres.php");
}
else if (isset($_GET["id_poly"])){
  $id = $_GET["id_poly"];
  include_once 'conn.php';
  $conn  = new conn();
  $conn->deletePoly($id);
  header("location: polycopes.php");
}







 ?>
