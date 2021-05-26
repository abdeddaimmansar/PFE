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

        public function __construct(){  }
        public function  __newEntry($id,$nom,$pr,$img,$dep,$tele,$email,$nbr){


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

        function toUpdate()
        {

          include_once("conn.php");

          $con = new conn();

          $con->updateAdherent($this->id_Adh,$this->nom_Adh,$this->prenom,$this->image,$this->depar,$this->tele,$this->email,$this->nbr_emprunt);


        }

    }
   class Etudiant extends Adherent
{
  public $cne;
  public $filiere;
  public $annee;

   public function __construct(){
     parent:: __construct();


   }

 public  function newEntry($id_Adh,$nom,$prenom,$dest,$depar,$tele,$email,$nbr_emprunt,$cne,$filiere,$annee)
  {
     parent:: __newEntry($id_Adh,$nom,$prenom,$dest,$depar,$tele,$email,$nbr_emprunt);
        echo "child";
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

  function waytostudent($id_Adh)
  {

    include_once("conn.php");
    $connn = new conn();
    return $connn->GetEtudiant($id_Adh);




  }
  function toUpdate()
  {
      include("conn.php");
      parent:: toUpdate();


        $conn = new conn();

    $conn->updateStudent($this->cne,$this->filiere,$this->annee,$this->id_Adh);


  }
  function emprunterEtu($id_vol,$cin,$duree)
  {

    include("conn.php");
    $conn= new conn();

    $conn->volumeStudent($id_vol,$cin,$duree);


  }
}
    class Enseignant extends Adherent{

        public function  newEntry($id_Adh,$nom,$pr,$img,$dep,$tele,$email,$nbr){
            parent:: newEntry($id_Adh,$nom,$pr,$img,$dep,$tele,$email,$nbr);

       }

        function addtodata(){
            include_once("conn.php");
            $con=new conn();
            parent:: addtodata();
		        $con->ajouterEnseignant($this->id_Adh);
        }
      function emprunterTea($id_vol,$cin,$duree)
        {

          include("conn.php");
          $conn= new conn();

          $conn->volumeTeacher($id_vol,$cin,$duree);


        }

    }

?>
