<?php
 session_start();
class conn{
	function __construct(){}
	function connexion(){
		$pdo = new PDO('mysql:host=localhost;dbname=ests','root','AZERTY123');
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

public	function ajouterEtudiant($cne,$filiere,$annee,$cin){

         try {
		    	$bbd=$this->connexion();
          $reponse=$bbd->prepare("insert into Etudiant values(?,?,?,?)");
          $reponse->execute([$cne,$filiere,$annee,$cin]);
          $reponse->closeCursor();
          $this->userLogin($cin,$cne);
         } catch (Exception $e) {
           echo $e->getMessage();
         }
      }
  public function userLogin($cin,$cne)
  {
    $username = $cne;
    $password = password_hash($cne,PASSWORD_DEFAULT);
    try {
        $bdd = $this->connexion();
        $reponse = $bdd->prepare("insert into users values(?,?,?)");
        $reponse->execute([$cin,$username,$password]);
        $reponse->closeCursor();

    } catch (Exception $e) {
        echo $e->getMessage();
    }}
    public function Getuser()
    {  echo "hhhhe";
      /*$bdd = $this->connexion();
      $requete="select * from users where username=?;";
      $res = $bdd->prepare($requete);
      $res->execute([$username]);
      if($fetch=$res->fetch())
      {

        $verify = password_verify($pass,$fetch["password"])
        if($verify)
        {          return true;
        }
       }
      else {
        return false;

      }*/

    }
 public function ajouterAdherent($cin,$nom_Adh,$prenom,$image,$depar,$tele,$email,$nbr_emprunt){

  echo "iam here";

  $bdd=$this->connexion();
	try{
		$reponse=$bdd->prepare("insert into Adherent
     values(?,?,?,?,?,?,?,?)");
		$reponse->execute([$cin,$nom_Adh, $prenom,$image,$depar,$tele,$email,$nbr_emprunt]);
		$reponse->closeCursor();

	}catch (Exception $e) {
		echo $e->getMessage();
  }

 }


 public function ajouterEnseignant($cin){
   $bdd=$this->connexion();
   $reponse=$bdd->prepare("insert into Enseignant values(?)");
   $reponse->execute([$cin]);
   $reponse->closeCursor();
   echo "__ober";
}


function listeAdherents(){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("select * from Adherent join Enseignant ON Adherent.cin=Enseignant.cin");
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
				 from Adherent join Etudiant ON Adherent.cin=Etudiant.cin");
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
  function ajouter($id,$lib)
  {
    echo $id;
    echo "<br>".$lib;


  }
 public function ajouterCategorie($id_cat,$liblecat){
 		$bdd=$this->connexion();
 		try{


 		$reponse=$bdd->prepare("insert into categorie(liblecat,image) values(?,?)");
 		$reponse->execute([$liblecat,$id_cat]);
 		$reponse->closeCursor();

 		}catch (Exception $e) {
 			echo $e->getMessage();
 		}
 }
 public function listecat()
 {
   $bdd=$this->connexion();
   $reponse = $bdd->prepare("select*from categorie");
  $reponse->execute();
  $fetch=$reponse->fetchAll();
  return $fetch;
 }
 public function GetCat($id)
 {
   $bdd=$this->connexion();
   $reponse = $bdd->prepare("select*from categorie where id_Cat = ?");
  $reponse->execute([$id]);
  $fetch=$reponse->fetch();
  return $fetch;


 }

 function listeCategorie($id)
 {
   $bdd=$this->connexion();
   $reponse = $bdd->prepare("select*from categorie where id_Cat=?");
 $reponse->execute($cin);
 return $reponse->fetch();
 }

 function supprimerCategorie($id)
 {
   try {  echo "string".$id;
     $bdd = $this->connexion();
     $res = $bdd->prepare("delete from categorie where id_Cat=?");
     $res->execute([$id]);
   } catch (Exception $e) {
       $e->getMessage();
   }



 }
 function updateCat($id,$liblecat,$folder)
 {
   $bdd=$this->connexion();
   $reponse = $bdd->prepare("update categorie set
   liblecat = '$folder',
   image = '$liblecat'
   where id_Cat  = '$id'
");
 $reponse->execute();

}
  //////****** update Student ********///////
   function GetEtudiant($id){

 	try {
 		$bdd=$this->connexion();
		$reponse=$bdd->prepare("select *
			  	 from   Adherent INNER JOIN Etudiant WHERE Adherent.cin=? AND Etudiant.cin=?
								    ");


 			$reponse->execute([$id,$id]);
			$fetch=$reponse->fetch();
 			$reponse->closeCursor();
 			return $fetch;

 	} catch (Exception $e) {
 		 echo $e->getMessage();
 	}

}
function GetTreacher($id){

try {
 $bdd=$this->connexion();
 $reponse=$bdd->prepare("select *
        from   Adherent INNER JOIN Enseignant WHERE Adherent.cin=? AND Enseignant.cin=?
                 ");


   $reponse->execute([$id,$id]);
   $fetch=$reponse->fetch();
   $reponse->closeCursor();
   return $fetch;

} catch (Exception $e) {
  echo $e->getMessage();
}

}

 function updateAdherent($cin,$nom_Adh,$prenom,$image,$depar,$tele,$email,$nbr_emprunt)
{
	  $cin=$_SESSION['userid'];
  echo $cin;
 try {
    $bdd = $this->connexion();
		$sql =  "UPDATE Adherent
		 set
		 nom_Adh='$nom_Adh',
		 email ='$email',
		 prenom='$prenom',
		 depar='$depar',
		 tele='$tele',
     nbr_emprunt = '$nbr_emprunt',
		 image='$image'
		 where  cin ='$cin'
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
			where  cin ='$id_Adh'
 		";
		$stmt = $bdd->prepare($sql);
		$stmt->execute();
  } catch (Exception $e) {
		echo $e->getMessage();

  }
}


function supprimerEtudiant($cin){
	 try {
		 $bdd = $this->connexion();
		 $res = $bdd->prepare("delete from Adherent where cin=?");
		 $res->execute([$cin]);
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
function ajouterVolume($titre,$image,$auteur,$editeur,$emplace,$statut){
   echo "stringvooooooo";
try {
  $bdd=$this->connexion();
	$reponse=$bdd->prepare("insert into Volume values(?,?,?,?,?,?,?)");
	$reponse->execute([$id_Vol,$titre,$image,$auteur,$editeur,$emplace,$statut]);
	$reponse->closeCursor();

} catch (Exception $e) {
    echo $e->getMessage();
}


}
function GetVolume($id){

try {
 $bdd=$this->connexion();
 $reponse=$bdd->prepare("select *
        from   Volume INNER JOIN Livre WHERE Volume.id_vol=? AND Livre.id_vol=?
                 ");


   $reponse->execute([$id,$id]);
   $fetch=$reponse->fetch();
   $reponse->closeCursor();
   return $fetch;

} catch (Exception $e) {
  echo $e->getMessage();
}

}

///////**********livre ***********////////
function listeLivres(){
	try {
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("select * from Volume join Livre ON Volume.id_vol=Livre.id_vol join categorie on Livre.id_Cat=categorie.id_Cat ");
    $reponse->execute();
  	return $reponse->fetchAll();

	} catch (Exception $e) {
		 echo $e->getMessage();
	}
}
function GetLivre($id){
	try {
		$bdd=$this->connexion();
		$reponse=$bdd->prepare("select * from Volume join Livre ON Volume.id_vol=Livre.id_vol join categorie on Livre.id_Cat=categorie.id_Cat
     where Volume.id_vol =? ");
    $reponse->execute([$id]);
  	return $reponse->fetch();

	} catch (Exception $e) {
		 echo $e->getMessage();
	}
}
 function ajouterLivre($id_Vol){

   try {
     $bdd=$this->connexion();
      $res=$bdd->prepare("select id_vol from Volume");
      $res->execute();
      $fetch = $res->fetchAll();
      $id = array_key_last($fetch);
     $reponse=$bdd->prepare("insert into Livre values(?,?)");
     $reponse->execute([$fetch[$id]["id_vol"],$id_Vol]);

     $reponse->closeCursor();
   } catch (Exception $e) {
      echo $e->getMessage();
   }


}
function UpdateLivre($id_vol,$id_cat,$titre,$image,$auteur,$editeur,$emplace,$statut)
{
  try {
         $bdd = $this->connexion();
         $volm="update Volume set
             titre = '$titre',
             image_v = '$image',
             editeur = '$editeur',
             auteur = '$auteur',
             emplacement = '$emplace',
             status = '$statut'
             where id_vol = '$id_vol'
         ";
       $livre = "update Livre set id_Cat = '$id_cat' where id_vol = '$id_vol'";
       echo "idcat ".$id_cat;
      $res = $bdd->prepare($volm);
     $res->execute();
     $res= $bdd->prepare($livre);
    $res->execute();
  } catch (Exception $e) {
     echo $e->getMessage();
  }

}
function deletelivre($id)
{
  try {
        $bdd = $this->connexion();
        $res = $bdd->prepare("delete from Volume where id_vol = ?");
        $res->execute([$id]);
  } catch (Exception $e) {
     echo $e->getMessage();
  }

}
///////**********Polycope ***********////////
function Getit(){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("select * from Volume join Polycope ON Volume.id_vol=Polycope.id_vol");
	$reponse->execute();
  $fetch= $response->fetchAll();
		/*$lst=[];
		while($ligne=$reponse->fetch()){
		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6]];
		}
		$reponse->closeCursor();*/
		return $fetch;
}
function listePolycopes(){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("select * from Volume join Polycope ON Volume.id_vol=Polycope.id_vol join categorie on Polycope.id_Cat=categorie.id_Cat");
		$reponse->execute();
		/*$lst=[];
		while($ligne=$reponse->fetch()){
		$lst[]=[$ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5],$ligne[6]];
		}
		$reponse->closeCursor();*/
		return $reponse->fetchAll();
}
function ajouterPolycope($id_Vol){
try {
  $bdd=$this->connexion();
  $res=$bdd->prepare("select id_vol from Volume");
  $res->execute();
  $fetch = $res->fetchAll();
  $id = array_key_last($fetch);
   $reponse=$bdd->prepare("insert into Polycope values(?,?)");
   $reponse->execute([$fetch[$id]["id_vol"],$id_Vol]);
   $reponse->closeCursor();

} catch (Exception $e) {
  echo $e->getMessage();
}


}
function supprimerPolycope($id_Vol){
	$bdd=$this->connexion();
	$reponse=$bdd->prepare("delete from Polycope where id_Vol= ?");
	$reponse->execute([$id_Vol]);

}
function UpdatePoly($id_p,$id_cat,$titre,$image,$auteur,$editeur,$emplace,$statut)
{
  try {
         $bdd = $this->connexion();
         $volm="update Volume set
             titre = '$titre',
             image_v = '$image',
             editeur = '$editeur',
             auteur = '$auteur',
             emplacement = '$emplace',
             status = '$statut'
             where id_vol = '$id_p'
         ";
       $livre = "update Polycope set id_Cat = '$id_cat' where id_vol = '$id_p'";
       echo "idcat ".$id_cat;
      $res = $bdd->prepare($volm);
     $res->execute();
     $res= $bdd->prepare($livre);
    $res->execute();
  } catch (Exception $e) {
     echo $e->getMessage();
  }


}
function GetPoly($id){

try {
 $bdd=$this->connexion();
 $reponse=$bdd->prepare("select *
        from   Volume INNER JOIN Polycope WHERE Volume.id_vol=? AND Polycope.id_vol=?
                 ");


   $reponse->execute([$id,$id]);
   $fetch=$reponse->fetch();
   $reponse->closeCursor();
   return $fetch;
   header('location :index.php');

} catch (Exception $e) {
  echo $e->getMessage();
}

}
function GetPolycope($id){

try {
 $bdd=$this->connexion();
 $reponse=$bdd->prepare("select *
        from   Volume JOIN Polycope ON Volume.id_vol= Polycope.id_vol  JOIN categorie ON Polycope.id_Cat=categorie.id_Cat
        where Polycope.id_vol = ?
                 ");


   $reponse->execute([$id]);
   $fetch=$reponse->fetch();
   $reponse->closeCursor();
   return $fetch;

} catch (Exception $e) {
  echo $e->getMessage();
}

}
function deletePoly($id)
{
  try {
        $bdd = $this->connexion();
        $res = $bdd->prepare("delete from Volume where id_vol = ?");
        $res->execute([$id]);
  } catch (Exception $e) {
     echo $e->getMessage();
  }

}
/************* ajouterDictionnaire ******************/
function ajouterDictionnaire($lang)
{
  try {
     $bdd=$this->connexion();
     $res=$bdd->prepare("select id_vol from Volume");
     $res->execute();
     $fetch = $res->fetchAll();
     $id = array_key_last($fetch);
    $reponse=$bdd->prepare("insert into Dictionnaire values(?,?)");
    $reponse->execute([$lang,$fetch[$id]["id_vol"]]);


    $reponse->closeCursor();
  } catch (Exception $e) {
     echo $e->getMessage();
  }
}
function listeDictionnaires()
{
  try {
        $bdd = $this->connexion();
        $reponse = $bdd->prepare("select*from Dictionnaire JOIN Volume on Dictionnaire.id_vol=Volume.id_vol");
        $reponse->execute();
       return  $reponse->fetchAll();
  } catch (Exception $e) {
     echo $e->getMessage();
  }
}
function GetDictionnaire($id)
{
  try {
        $bdd = $this->connexion();
        $reponse = $bdd->prepare("select*from Dictionnaire JOIN Volume on Dictionnaire.id_vol=Volume.id_vol where Dictionnaire.id_vol = ?");
        $reponse->execute([$id]);
       return  $reponse->fetch();
  } catch (Exception $e) {
     echo $e->getMessage();
  }
}
function Deletedic($id)
{
  try {
        $bdd = $this->connexion();
        $res = $bdd->prepare("delete from Volume where id_vol = ? ");
        $res->execute([$id]);
  } catch (Exception $e) {
     echo $e->getMessage();
  }

}
function updateDic($id,$tit,$img,$aut,$ed,$emp,$stat,$lang)
{
  try {
       $bdd = $this->connexion();

    $volm="update Volume set
        titre = '$tit',
        image_v = '$img',
        editeur = '$ed',
        auteur = '$aut',
        emplacement = '$emp',
        status = '$stat'
        where id_vol = '$id'
    ";
  $livre = "update Dictionnaire set language = '$lang' where id_vol = '$id'";

  $res = $bdd->prepare($volm);
  $res->execute();

  $res= $bdd->prepare($livre);
  $res->execute();
   }catch (Exception $e) {
     echo $e->getMessage();
   }

}

 /********************** ADD emprunetur ***************************/
  function volumeStudent($id_vol,$cin,$duree)
  {
     try {

      $date = date('Y-m-d');
      $duree = date('Y-m-d', strtotime( $d . " +".$duree." days"));



       $bdd = $this->connexion();

       $response=$bdd->prepare("insert into emprunter_Etud values(?,?,?,?)");
        $response->execute([$id_vol,$cin,$date,$duree]);
          echo "done!";
     } catch (Exception $e) {
       echo $e->getMessage();
     }


  }
  function updateEmpruntEtu($id_vol,$cin,$duree,$date){

    try {

     //$date = date('Y-m-d');
     $duree = date('Y-m-d', strtotime( $date . " +".$duree." days"));



      $bdd = $this->connexion();

      $response=$bdd->prepare("update emprunter_Etud set
             date_emp = '$date',
             dateRet = '$duree'
             WHERE id_vol = '$id_vol' and cin = '$cin'

      ");
       $response->execute([$id_vol,$cin,$date,$duree]);
         echo "done!";
    } catch (Exception $e) {
      echo $e->getMessage();
    }


  }
  function volumeTeacher($id_vol,$cin,$duree)
  {
     try {
       echo "blalalalalalalalal";
      $date = date('Y-m-d');
      $duree = date('Y-m-d', strtotime( $d . " +".$duree." days"));



       $bdd = $this->connexion();

       $response=$bdd->prepare("insert into emprunter_Ens values(?,?,?,?)");
        $response->execute([$id_vol,$cin,$date,$duree]);
          echo "done!";
     } catch (Exception $e) {
       echo $e->getMessage();
     }


  }
  function EmpStudent(){

    try {
      $bdd = $this->connexion();
      $reponse=$bdd->prepare("select*from
                            emprunter_Etud INNER JOIN Adherent ON emprunter_Etud.cin=Adherent.cin
                            INNER JOIN Volume ON Volume.id_vol=emprunter_Etud.id_vol ORDER by dateRet ASC
                              ");

      $reponse->execute();
      return $reponse->fetchAll();

    } catch (Exception $e) {
       echo $e->getMessage();
    }


}
function deleteEmpEtudiant($id_et)
{
  try {  echo "gggg";
        $bdd = $this->connexion();
        $res = $bdd->prepare("delete from emprunter_Etud where cin = ?");
        $res->execute([$id_et]);
  } catch (Exception $e) {
    echo $e->getMessage();
  }

}
function GetEmpEtu($id_vol)
{
  try {

        $bdd = $this->connexion();
        $res = $bdd->prepare("select * from emprunter_Etud where cin = ? ");
        $res->execute([$id_vol]);
        return $res->fetch();
     }catch (Exception $e) {
    echo $e->getMessage();
  }
}
function GetEmpEns($id_vol){
  try {

        $bdd = $this->connexion();
        $res = $bdd->prepare("select * from emprunter_Ens where cin = ? ");
        $res->execute([$id_vol]);
        return $res->fetch();
     }catch (Exception $e) {
    echo $e->getMessage();
  }



}

function EmpTeacher(){

  try {
    $bdd = $this->connexion();
    $reponse=$bdd->prepare("select*from
                          emprunter_Ens INNER JOIN Adherent ON emprunter_Ens.cin=Adherent.cin
                          INNER JOIN Volume ON Volume.id_vol=emprunter_Ens.id_vol ORDER by dateRet ASC
                            ");

    $reponse->execute();
    return $reponse->fetchAll();



  } catch (Exception $e) {
     echo $e->getMessage();
  }


}
function CountStudent()
{
  try {
    $sql = "SELECT COUNT(*) FROM Etudiant";
       $stmt = $this->connexion()->query($sql);
       $count = $stmt->fetchColumn();
       return $count;
  } catch (Exception $e) {
     echo $e-getMessage();
  }

}
function CountTeacher()
{
  try {
    $sql = "SELECT COUNT(*) FROM Enseignant";
       $stmt = $this->connexion()->query($sql);
       $count = $stmt->fetchColumn();
       return $count;
  } catch (Exception $e) {
     echo $e-getMessage();
  }

}
function Reservation()
{
   try {
        $bdd = $this->connexion();
        $res = $bdd->prepare(" select *from Reservation join Volume on Reservation.id_vol = Volume.id_vol join Adherent on Reservation.cin = Adherent.cin ");
        $res->execute();
        return $res->fetchAll();
   } catch (Exception $e) {
      echo $e->getMessage();
   }

}
function deleteReser($cin,$id)
{
  try {
      $bdd = $this->connexion();
       $res =  $bdd->prepare("delete from  Reservation where cin  = ? and id_vol = ?");
      $res->execute([$cin,$id]);

  } catch (Exception $e) {
     echo $e->getMessage();
  }

}

}


?>
