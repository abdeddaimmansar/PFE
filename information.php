 <?php
 session_start();
 if($_SESSION['loggedin']== false)
 {
   header("location: logout.php");
 }
  if(isset($_POST['student']))
  {    $_SESSION['id_vol'] = $_POST['id'];
     header('Location: searchstudent.php');

  }
  else {
    $_SESSION['id_vol'] = $_POST['id'];
    header('Location: searchteacher.php');
  }

  ?>
