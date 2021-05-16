<?php
 session_start();
class conn{
	function __construct(){}
	function connexion(){
		$pdo = new PDO('mysql:host=localhost;dbname=ESTS','root','AZERTY123');
		return $pdo;
	}
public function authentifier($username,$password){

		$bdd = $this->connexion();
		$requete="select * from admin where username=? and password = ? ;";
		$res = $bdd->prepare($requete);
		$res->execute([$username,$password]);
		if($ligne= $res->fetch()) return true;
		return false;
	}

public	function ajouterEtudiant($cne,$filiere,$annee,$id_Adh){

         try {
			$bbd=$this->connexion();
          $reponse=$bbd->prepare("insert into Etudiant values(?,?,?,?)");

		  $reponse->execute([$cne,$filiere,$annee,$id_Adh]);

		  $reponse->closeCursor();



         } catch (Exception $e) {
           echo $e->getMessage();
         }}
 public function ajouterAdherent($id_Adh,$nom_Adh,$prenom,$image,$depar,$tele,$email,$nbr_emprunt){
     $bdd=$this->connexion();
	try{
		$reponse=$bdd->prepare("insert into Adherent values(?,?,?,?,?,?,?,?)");
		$reponse->execute([$id_Adh,$nom_Adh,$prenom,$image,$depar,$tele,$email,$nbr_emprunt]);
		$reponse->closeCursor();

	}catch (Exception $e) {
		echo $e->getMessage();
	  }

 }


 public function ajouterEnseignant($id_Adh){
   $bdd=$this->connexion();
   $reponse=$bdd->prepare("insert into Enseignant values(?)");
   $reponse->execute([$id_Adh]);
   $reponse->closeCursor();
}


function listeAdherents(){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("select * from Adherent join Enseignant ON Adherent.id_Adh=Enseignant.id_Adh");
		$reponse->execute();
		$lst=[];
		while($ligne=$reponse->fetch()){
				$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7]];
		}
		$reponse->closeCursor();
		return $lst;
}
function listeEtudiant(){
	try {
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("select *
				 from Adherent join Etudiant ON Adherent.id_Adh=Etudiant.id_Adh");

//		$reponse=$bdd->prepare("select * from Adherent Etudiant where id_Adh.Adherent=id_Adh.Etudiant");
			$reponse->execute();
			$lst=[];
			while($ligne=$reponse->fetch()){
					$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7],$ligne[8],$ligne[9],$ligne[10]];
			}
			$reponse->closeCursor();
			return $lst;

	} catch (Exception $e) {
		 echo $e->getMessage();
	}

 }
}
  //////****** update Student ********///////
   function GetEtudiant($id){

 	try {
 		$bdd=$this->connexion();
		$reponse=$bdd->prepare("select *
			  	 from   Adherent INNER JOIN Etudiant WHERE Adherent.id_Adh=? AND Etudiant.id_Adh=?
								    ");

	 
 			$reponse->execute([$id,$id]);
			$fetch=$reponse->fetch();
 			$reponse->closeCursor();
 			return $fetch;

 	} catch (Exception $e) {
 		 echo $e->getMessage();
 	}

}

 function updateAdherent($id_Adh,$nom_Adh,$prenom,$image,$depar,$tele,$email,$nbr_emprunt)
{
	  $id_Adh=$_SESSION['userid'];

 try {
    $bdd = $this->connexion();
		$sql =  "UPDATE Adherent
		 set
		 nom_Adh='$nom_Adh',
		 email ='$email',
		 prenom='$prenom',
		 depar='$depar',
		 tele='$tele',
		 image='$image'
		 where  id_Adh ='$id_Adh'
		";
		$stmt = $bdd->prepare($sql);
		$stmt->execute();
		echo "__we done for thos one";
  } catch (Exception $e) {
		echo $e->getMessage();

  }

}

function updateStudent($cne,$filiere,$annee,$id_Adh)
{

	 $id_Adh=$_SESSION['userid'];


	try {
		 $bdd= $this->connexion();
		$sql =  "UPDATE Etudiant
		 set
		  cne='$cne',
		  filiere ='$filiere',
		  Annee='$annee'
			where  id_Adh ='$id_Adh'
 		";
		$stmt = $bdd->prepare($sql);
		$stmt->execute();
  } catch (Exception $e) {
		echo $e->getMessage();

  }
}



///////**********volume ***********////////

function listeVolumes(){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("select * from volume ORDER BY 'id_Vol'");
		$reponse->execute();
		$lst=[];
		while($ligne=$reponse->fetch()){
		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6]];
		}
		$reponse->closeCursor();
		return $lst;
}
function ajouterVolume($id_Vol,$titre,$image,$auteur,$editeur,$emplace,$statut){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("insert into volume values(?,?,?,?,?,?,?)");
	$reponse->execute([$id_Vol,$titre,$image,$auteur,$editeur,$emplace,$statut]);
	$reponse->closeCursor();
}

///////**********livre ***********////////
function listeLivres(){
	try {
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("select * from volume join livre ON volume.id_Vol=livre.id_Vol ");

			$reponse->execute();
			$lst=[];
			while($ligne=$reponse->fetch()){
			$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6]];
			}
			$reponse->closeCursor();
			return $lst;

	} catch (Exception $e) {
		 echo $e->getMessage();
	}
}
 function ajouterLivre($id_Vol){
  $bdd=$this->connexion();
  $reponse=$bdd->prepare("insert into livre values(?)");
  $reponse->execute([$id_Vol]);
  $reponse->closeCursor();
}
///////**********Polycope ***********////////
function listePolycopes(){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("select * from volume join polycope ON volume.id_vol=polycope.id_vol");
		$reponse->execute();
		$lst=[];
		while($ligne=$reponse->fetch()){
		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6]];
		}
		$reponse->closeCursor();
		return $lst;
}
function ajouterPolycope($id_Vol){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("insert into polycope values(?)");
	$reponse->execute([$id_Vol]);
	$reponse->closeCursor();
}
function supprimerPolycope($id_Vol){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("delete from polycope where id_Vol= ?");
	$reponse->execute([$id_Vol]);
		
}


?>
