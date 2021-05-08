<?php

 class Adherent{
        public $id_Adh;
        public $nom_Adh;
        public $prenom;
        public $image;
        public $depar;
        public $tele;
        public $email;
        public $nbr_emprunt;


        public function  __construct($id,$nom,$pr,$img,$dep,$tele,$email,$nbr){
            $this->id_Adh=$id;
            $this->nom_Adh=$nom;
	        	$this->prenom=$pr;
		        $this->image=$img;
		        $this->depar=$dep;
            $this->tele=$tele;
            $this->email=$email;
		        $this->nbr_emprunt=$nbr;
        }

        public function addtodata(){
            include_once("conn.php");
            $con=new conn();
		        $con->ajouterAdherent($this->id_Adh,$this->nom_Adh,$this->prenom,$this->image,$this->depar,$this->tele,$this->email,$this->nbr_emprunt);
        }

    }
    class Etudiant extends Adherent
{
  public $cne;
  public $filiere;
  public $annee;

  function __construct($id_Adh,$nom,$prenom,$dest,$depar,$tele,$email,$nbr_emprunt,$cne,$filiere,$annee)
  {
     parent:: __construct($id_Adh,$nom,$prenom,$dest,$depar,$tele,$email,$nbr_emprunt);

       $this->cne=$cne;
       $this->filiere=$filiere;
       $this->annee = $annee;
  }
public  function addtodata()
  {  
     include_once("conn.php");
     $connn = new conn();
      parent:: addtodata();
     $connn->ajouterEtudiant($this->cne,$this->filiere,$this->annee,$this->id_Adh);


  }
}
    class Enseignant extends Adherent{

        public function  __construct($id_Adh,$nom,$pr,$img,$dep,$tele,$email,$nbr){
            parent::__construct($id_Adh,$nom,$pr,$img,$dep,$tele,$email,$nbr);

       }

        function addtodata(){
            include_once("conn.php");
            $con=new conn();
            parent:: addtodata();
		        $con->ajouterEnseignant($this->id_Adh);
        }


    }

?>
