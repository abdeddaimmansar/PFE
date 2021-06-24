<?php


  if (!isset($_POST['submit'])){
   header("location: login.php");
   die();
    }
   $username = $_POST['username'];
   $password = $_POST['pass'];

   $result = 1;

   try{
   include_once("dbAdmin.php");


  $conn = new dbAdmin();

 if($conn->superuser($username,$password))
    { session_start();


      $_SESSION['loggedin']=true;
     header('location: index.php');
   }else {
       header('location: login.php?result=2');
     }
} catch(Expetion $e)
  {
    echo $e->getMessage();
  }
  /*$stmt = $conn->query("select*from admin");

  $rows = $stmt->fetchAll();
  $result=1;


 foreach ($rows as $row) {
      if($_POST["username"]==$row['username']&&($_POST["pass"]==$row['password']))
      {

       session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
       $_SESSION['name']= $row['nom_adm'];
       $_SESSION['prenom'] = $row['prenom'];

       header('location: index.php');

     }
     else {
       header('location: login.php?result=2');
     }

 }

  /*i($row['password']==$_POST["pass"])
   {

      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
     $_SESSION['name']= $post['nom_adm'];
     $_SESSION['prenom'] = $post['prenom'];

     header('location: index.php');

   }
   else {
     header('location: login.php?result=2');
   }*/















 ?>
