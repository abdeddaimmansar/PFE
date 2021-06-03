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
 ////////////////////////////***********Livres *************///////////////////////////////
 public function listeLivres($cat){ 
	try{
		   $bdd = $this->connexion();
		   $sql = 'SELECT volume.titre, volume.image, volume.STATUS  from volume JOIN livre ON volume.id_Vol=livre.id_Vol  WHERE livre.categorie = '.$cat;
		   $stmt = $bdd->prepare($sql);
		   $stmt->execute([$ca]);
		   $result = $stmt->fetchAll();
		   return $result;
	   }catch(Exception $ex){
			   echo ($ex -> getMessage());
	   }
}
public function nbrLivres(){ 
	try{
		   $bdd = $this->connexion();
		   $sql = "SELECT COUNT(*) FROM livre;" ;
		   $stmt = $bdd->prepare($sql);
		   $stmt->execute();
		   $count = $stmt->fetchColumn();
		   return $count;
	   }catch(Exception $ex){
			   echo ($ex -> getMessage());
	   }
}
 ////////////////////////////***********Polycopes *************///////////////////////////////
public function listePolycope(){ 
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


}

