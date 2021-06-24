<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
if(isset($_POST["submit"]) || isset($_POST["updatedic"]) ) {

  $filename = $_FILES["image"]["name"];
  if(empty($filename))
  {
    $folder = $_SESSION['image_v'];
  }
  else {
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "assets/img/".$filename;
    move_uploaded_file($tempname,$folder);
  }

  $titre = $_POST["titre"];
  $auteur = $_POST["auteur"];
  $editeur = $_POST["editeur"];
  $emplace = $_POST["emplace"];
  $statut = $_POST["status"];
  $lang = $_POST["language"];


  if(empty($titre)|| empty($folder)|| empty($auteur) || empty($editeur) || empty($emplace)
      || empty($statut)||empty($lang)){
        echo "string_".$_POST["titre"];
        echo "<br>".$_POST["auteur"];
        echo "<br>".$_POST["editeur"];
        echo "<br>".$_POST["emplace"];
        echo "<br>".$_POST["status"];
  header('location:add-dictionnaire.php?empty');
  }else{

    include("Volume.php");
    $en = new Dictionnaire();
    $en->newEntry($titre,$folder,$auteur,$editeur,$emplace,$statut,$lang);
    if(isset($_POST["submit"]))
    {
        $en->addtodata();
    }
    else if (isset($_POST["updatedic"])) {
            $en->upadateDic($_SESSION['id_vol']);
    }

   header("location: dictionnaire.php");


}




}
elseif (isset($_GET["deletedic"])) {

     include 'conn.php';
     $conn = new conn();
     $conn->Deletedic($_GET["deletedic"]);
     header("location: dictionnaire.php");
}



 ?>
