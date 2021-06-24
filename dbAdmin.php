<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}
class dbAdmin
{

  function __construct(){}
    function connexion(){
  		$pdo = new PDO('mysql:host=localhost;dbname=ests','root','AZERTY123');
  		return $pdo;
  	}
  function superuser($username,$password)
  {
       $bdd = $this->connexion();
        $requete="select * from admin where username=? and password = ? ;";
        $res = $bdd->prepare($requete);
        $res->execute([$username,$password]);
        if($ligne= $res->fetch())
         { $_SESSION['thisAdmin']  = $ligne['id_adm'];
           $_SESSION['loggedin'] = true;
           $_SESSION['admin'] = $ligne;
           return true;
         }

        return false;

  }
  function UpdateAdmin($name,$prenom,$image,$tele,$email,$username,$password)
  {
    //$password = password_hash($password,PASSWORD_DEFAULT);

   try {
      $id = $_SESSION['admin']['id_adm'];
      echo $id;
      $bdd = $this->connexion();
      $res = $bdd->prepare("update admin set
           nom_adm = '$name',
           prenom = '$prenom',
           image = '$image',
           tele = '$tele',
           email = '$email',
           username = '$username',
           password = '$password'
           where id_adm ='$id'
      ");
       $res->execute();
   } catch (Exception $e) {
      echo $e->getMessage();
   }
}
   function  PassSave($id,$password)
   {
//   $passwor = password_hash($password,PASSWORD_DEFAULT);

    try {
        $bdd = $this->connexion();
       $res = $bdd->prepare("update admin set
            password = '$password'
            where id_adm ='$id'
       ");
        $res->execute();
    } catch (Exception $e) {
       echo $e->getMessage();
    }
   }
function getAdmin()
{
   try {
         $bdd = $this->connexion();
         $res = $bdd->prepare("select * from admin where id_adm = ?");
         $res->execute([$_SESSION['thisAdmin']]);
         unset($_SESSION['admin']);
         $_SESSION['admin'] = $res->fetch();
   } catch (Exception $e) {
         $e->getMessage();
   }
}



}






 ?>
