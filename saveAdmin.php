<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
if(isset($_POST['update']))
{

  if(empty($_POST["name"])||empty($_POST["prenom"])||empty($_POST["tele"])||empty($_POST["email"])||empty($_POST["username"])||
  empty($_POST["password"]))
  {
    header('location: Edit-admin.php');

  }
else {

   $filename = $_FILES["photo"]["name"];
   if(!empty($filename))
   {
     $tempname = $_FILES["photo"]["tmp_name"];
     $folder = "assets/img/profiles/".$filename;
       move_uploaded_file($tempname,$folder);
   }
   else {
     $folder = $_SESSION['admin']['image'];
   }



  include('admin.php');
  $admin = new admin();
  echo "_lo_";
  $admin->Update($_POST["name"],$_POST["prenom"],$folder,$_POST["tele"],$_POST["email"],$_POST["username"],$_POST["password"]);
   //header('location: profile.php');
}




}



 ?>
