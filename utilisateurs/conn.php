<?php
class conn{
	function __construct(){}
	function connexion(){
		$pdo = new PDO('mysql:host=localhost;dbname=biblio','root');
		return $pdo;
	}
public function authentifier($username,$PASSWORD){

		$bdd = $this->connexion();
		$requete="SELECT * from adherent JOIN users ON adherent.cin=users.cin where users.username=adherent.cin and users.password =adherent.cin ;";
		$res = $bdd->prepare($requete);
		$res->execute([$username,$password]);
		if($ligne= $res->fetch()) return true;
		return false;
}
 public function listeCategorie(){ 
	 try{
			$bdd = $this->connexion();
			
			$sql = "SELECT id_cat, liblecat, image FROM categorie ORDER BY liblecat";
        
            $stmt = $bdd->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
			return $result;

        }catch(Exception $ex){
                echo ($ex -> getMessage());
        }
 }
   ////////////////////////////***********Volume *************///////////////////////////////
  public function listeVolume(){ 
	try{
		if(isset($_GET['id_vol']))
		{
		  $id = $_GET['id_vol'];
		   $bdd = $this->connexion();
		   $sql = "SELECT *  from volume  WHERE id_vol = '$id' ";
		   $stmt = $bdd->prepare($sql);
		   $stmt->execute();
		   $result = $stmt->fetchAll();
		   return $result;
		}
		else {
		   echo "error";
		}
	   }catch(Exception $ex){
			   echo ($ex -> getMessage());
	   }
}
 ////////////////////////////***********Livres *************///////////////////////////////
 public function listeLivres(){ 
	try{
		if(isset($_GET['categorie']))
		{
		  $cat = $_GET['categorie'];
		   $bdd = $this->connexion();
		   $sql = "SELECT *  from volume JOIN livre ON volume.id_Vol=livre.id_Vol  WHERE livre.categorie = '$cat' ";
		   $stmt = $bdd->prepare($sql);
		   $stmt->execute();
		   $result = $stmt->fetchAll();
		   return $result;
		}
		else {
		   echo "error";
		}
	   }catch(Exception $ex){
			   echo ($ex -> getMessage());
	   }
}
public function nbrLivres($cat){ 
	try{
		   
		   $bdd = $this->connexion();
		   $sql = "SELECT COUNT(*) FROM livre where categorie = ?;" ;
		   $stmt = $bdd->prepare($sql);
		   $stmt->execute([$cat]);
		   $count = $stmt->fetchColumn();
		   return $count;
	   }catch(Exception $ex){
			   echo ($ex -> getMessage());
	   }
}
 ////////////////////////////***********Polycopes *************///////////////////////////////
public function listePolycope(){ 
	try{
		if(isset($_GET['categorie']))
		{
		  $cat = $_GET['categorie'];
		   $bdd = $this->connexion();
		   $sql = "SELECT *  from volume JOIN polycope ON volume.id_Vol=polycope.id_Vol  WHERE polycope.categorie = '$cat' ";
		   $stmt = $bdd->prepare($sql);
		   $stmt->execute();
		   $resultat = $stmt->fetchAll();
		   return $resultat;
		}
		else {
		   echo "error";
		}
	   }catch(Exception $ex){
			   echo ($ex -> getMessage());
	   }
}
public function nbrPolycopes($cat){ 
	try{
		   $bdd = $this->connexion();
		   $sql = "SELECT COUNT(*) FROM polycope where categorie = ?;" ;
		   $stmt = $bdd->prepare($sql);
		   $stmt->execute([$cat]);
		   $count = $stmt->fetchColumn();
		   return $count;
	   }catch(Exception $ex){
			   echo ($ex -> getMessage());
	   }
}
}

