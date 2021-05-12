<?php
	$id_cat=$_GET['id_cat'];
	include_once("conn.php");
     $connn = new conn();
     $connn ->supprimerCategorie($id_cat);
	header("location:categorie.php");
?>