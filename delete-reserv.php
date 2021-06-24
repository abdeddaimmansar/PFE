<?php
 session_start();
 if(isset($_GET['deletreser']))
 {
   include_once 'conn.php';
   $conn = new conn();
    $conn->deleteReser($_GET["deletreser"],$_GET["id_vol"]);
   header("location: reservations.php");


 }


 ?>
