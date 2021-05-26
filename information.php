 <?php
 session_start();
  if(isset($_POST['student']))
  {    $_SESSION['id_vol'] = $_POST['id'];
     header('Location: searchstudent.php');

  }
  else {
    $_SESSION['id_vol'] = $_POST['id'];
    header('Location: searchteacher.php');
  }

  ?>
