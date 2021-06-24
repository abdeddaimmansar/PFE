<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
include 'conn.php';
if (isset($_GET['DTcin'])) {
   $cin = $_GET['DTcin'];
   $teacher = new conn();
   $teacher->deletTeacherEmp()
}





 ?>
