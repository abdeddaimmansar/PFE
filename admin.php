<?php

class Admin
{
  protected $nom;
  protected $prenom;
  protected $image;
  protected $email;
  protected $tele;
  protected $username;
  protected $password;

  function __construct(){}
  function  adminDetails($nom,$pre,$image,$email,$tele,$username,$pas)
  {
     $this->nom = $nom;
     $this->prenom = $pre;
     $this->image  = $image;
     $this->tele = $tele;
     $this->username = $username;
     $this->password = $pas;
  }
function  Update($name,$prenom,$image,$tele,$email,$username,$password){
   include 'dbAdmin.php';
   $ad = new dbAdmin();
   $ad->UpdateAdmin($name,$prenom,$image,$tele,$email,$username,$password);

}
function getadmin()
{
   include 'dbAdmin.php';
   $conn = new dbAdmin();
   $conn->getAdmin();


}
function savePass($id,$password)
{
  include 'dbAdmin.php';
  $db = new dbAdmin();
  $db->PassSave($id,$password);
}


}



 ?>
