<?php
class conn{
	function __construct(){}
	function connexion(){
		$pdo = new PDO('mysql:host=localhost;dbname=ests','root');
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


//////////////////////*********Adherent***********//////////////////////////
public function ajouterAdherent($id_Adh,$nom_Adh,$prenom,$image,$depar,$email,$nbr_emprunt,$username,$password){
		$bdd=$this->connexion();
		try{
			$reponse=$bdd->prepare("insert into Adherent values(?,?,?,?,?,?,?,?,?)");
			$reponse->execute([$id_Adh,$nom_Adh,$prenom,$image,$depar,$email,$nbr_emprunt,$username,$password]);
			$reponse->closeCursor();

		}catch (Exception $e) {
			echo $e->getMessage();
			}

}


function updateAdherent($id_Adh,$nom_Adh,$prenom,$image,$depar,$email,$nbr_emprunt){
			$id_Adh=$_SESSION['userid'];

	try {
		$bdd = $this->connexion();
			$sql =  "UPDATE Adherent
			set
			nom_Adh='$nom_Adh',
			email ='$email',
			prenom='$prenom',
			depar='$depar',
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


////////////////////////*********Etudiant***********//////////////////////////
public	function ajouterEtudiant($cne,$filiere,$annee,$id_Adh){

         try {
			$bbd=$this->connexion();
          $reponse=$bbd->prepare("insert into Etudiant values(?,?,?,?)");

		  $reponse->execute([$cne,$filiere,$annee,$id_Adh]);

		  $reponse->closeCursor();



         } catch (Exception $e) {
           echo $e->getMessage();
         }
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
					$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7],$ligne[8],$ligne[9],$ligne[10],$ligne[11]];
			}
			$reponse->closeCursor();
			return $lst;

	} catch (Exception $e) {
		 echo $e->getMessage();
	}

}

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


function updateStudent($cne,$filiere,$annee,$id_Adh){

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


function supprimerEtudiant($cne){
	try {
		$bdd = $this->connexion();
		$res = $bdd->prepare("delete from Adherent where id_Adh=?");
		$res->execute([$cne]);
	} catch (Exception $e) {
		  echo $e->getMessage();
	}


}

 
///////////////////////*********Enseignant***********//////////////////////////
public function ajouterEnseignant($id_Adh){
   $bdd=$this->connexion();
   $reponse=$bdd->prepare("insert into Enseignant values(?)");
   $reponse->execute([$id_Adh]);
   $reponse->closeCursor();
}


function listeEnseignants(){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("select * from Adherent join Enseignant ON Adherent.id_Adh=Enseignant.id_Adh");
		$reponse->execute();
		$lst=[];
		while($ligne=$reponse->fetch()){
		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6],$ligne[7],$ligne[8],$ligne[9]];
		}
		$reponse->closeCursor();
		return $lst;
}


function supprimerEnseignant($id_Adh){
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("delete from Adherent where id_Adh= ?");
		$reponse->execute([$id_Adh]);
}


///////////////////////*********Categorie***********//////////////////////////
public function ajouterCategorie($id_cat,$liblecat){
		$bdd=$this->connexion();
		try{
		$reponse=$bdd->prepare("insert into categorie values(?,?)");
		$reponse->execute([$id_cat,$liblecat]);
		$reponse->closeCursor();
		}catch (Exception $e) {
			echo $e->getMessage();
		}
}

	 
function listeCategories(){
	      $bdd=$this->connexion();
	      $reponse=$bdd->prepare("select * from categorie ");
		  $reponse->execute();
		  $lst=[];
		  while($ligne=$reponse->fetch()){
		     $lst[]=[$ligne[0],$ligne[1]];
		    }
		   $reponse->closeCursor();
		    return $lst;
}

function supprimerCategorie($id_cat){
			$bdd=$this->connexion();
			$reponse=$bdd->prepare("delete from categorie where id_cat= ?");
			$reponse->execute([$id_cat]);
}

function GetCategorie($id_cat){

	try {
		$bdd=$this->connexion();
	   $reponse=$bdd->prepare("select * from  categorie ");
			$reponse->execute([$id_cat]);
		   $fetch=$reponse->fetch();
			$reponse->closeCursor();
			return $fetch;

	} catch (Exception $e) {
		 echo $e->getMessage();
	}

}


function updateCategorie($id_cat,$liblecat){

	 $id_cat=$_SESSION['userid'];


	try {
		 $bdd= $this->connexion();
		$sql =  "UPDATE categorie
		 set
		 liblecat='$liblecat',
		
			where  id_cat ='$id_cat'";
		 
		$stmt = $bdd->prepare($sql);
		$stmt->execute();
  } catch (Exception $e) {
		echo $e->getMessage();

  }
}

   
public function get16(){
	$bdd=$this->connexion();
	$sql = "SELECT liblecat FROM categorie ORDER BY liblecat";
    $stmt = $bdd->prepare($sql);
	$stmt->execute();

	
}

public function gettout(){
	$bdd=$this->connexion();
	$sql = "SELECT * FROM categorie ";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();
}
public function gettoutCategorie(){
	$bdd=$this->connexion();
	$sql = "SELECT * FROM categorie where liblecat='$this->liblecat'";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();
	 
}


///////////////////////*********Volume***********//////////////////////////
	   
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


///////////////////////*********Livre***********//////////////////////////
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


///////////////////////*********Polycope***********//////////////////////////
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
	
}


?>
