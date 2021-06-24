<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
if (isset($_POST["savepassword"])) {
 if ($_POST["password"]=$_SESSION['admin']['password']) {
       if ($_POST["pass1"]=$_POST["pass2"]) {
             include 'admin.php';
             $ad = new admin();
             $ad->savePass($_SESSION['admin']['id_adm'],$_POST["pass1"]);
       }
       else {
         echo "passwords didn't mutch";
       }
 }
 else {
   header("location: profile.php");
  }




}
header("location: profile.php");



 ?>
