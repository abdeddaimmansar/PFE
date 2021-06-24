<?php

 class Adherent{
        public $cin;
        public $nom_Adh;
        public $prenom;
        public $image;
        public $depar;
        public $tele;
        public $email;
        public $nbr_emprunt;

        public function __construct(){  }
        public function  __newEntry($cin,$nom,$pr,$img,$dep,$tele,$email,$nbr){


            $this->cin=$cin;
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
 		        $con->ajouterAdherent($this->cin,$this->nom_Adh,$this->prenom,$this->image,$this->depar,$this->tele,$this->email,$this->nbr_emprunt);
        }

        function toUpdate()
        {

          include_once("conn.php");

          $con = new conn();

          $con->updateAdherent($this->cin,$this->nom_Adh,$this->prenom,$this->image,$this->depar,$this->tele,$this->email,$this->nbr_emprunt);


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

 public  function newEntry($cin,$nom,$prenom,$dest,$depar,$tele,$email,$nbr_emprunt,$cne,$filiere,$annee)
  {
     parent:: __newEntry($cin,$nom,$prenom,$dest,$depar,$tele,$email,$nbr_emprunt);
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
     $connn->ajouterEtudiant($this->cne,$this->filiere,$this->annee,$this->cin);
  }

  function waytostudent($cin)
  {

    include_once("conn.php");
    $connn = new conn();
    return $connn->GetEtudiant($cin);
  }
  function toUpdate()
  {
      include("conn.php");
      parent:: toUpdate();


        $conn = new conn();

    $conn->updateStudent($this->cne,$this->filiere,$this->annee,$this->cin);


  }
  function emprunterEtu($id_vol,$cin,$duree)
  {

    include("conn.php");
    $conn= new conn();

    $conn->volumeStudent($id_vol,$cin,$duree);


  }
  function updateEmprunt($id_vol,$cin,$duree,$date)
  {

    include_once("conn.php");
    $conn= new conn();

    $conn->updateEmpruntEtu($id_vol,$cin,$duree,$date);


  }
  function GetEmprunt()
  {
    include_once 'conn.php';
    $emp = new conn();
    return $emp->EmpStudent();
  }
  function Count()
  {
    include_once 'conn.php';
    $conn = new conn();
    return $conn->CountStudent();
  }
  function GetoneEmprunte($id_vol)
  {
    include_once 'conn.php';
    $conn = new conn();
    return $conn->GetEmpEtu($id_vol);
  }
}
    class Enseignant extends Adherent{
          function __construct(){parent:: __construct();}
        public function  newEntry($cin,$nom,$pr,$img,$dep,$tele,$email,$nbr){
            parent:: __newEntry($cin,$nom,$pr,$img,$dep,$tele,$email,$nbr);

       }

        function addtodata(){
            include_once("conn.php");
            $con=new conn();
            parent:: addtodata();
		         $con->ajouterEnseignant($this->cin);
        }
        function waytostudent($id_Adh)
        {

          include_once("conn.php");
          $connn = new conn();
          return $connn->GetTreacher($id_Adh);
        }
        function toUpdate()
        {
           include("conn.php");
           parent:: toUpdate();


        }
        function emprunterTea($id_vol,$cin,$duree)
        {

          include("conn.php");
          $conn= new conn();

          $conn->volumeTeacher($id_vol,$cin,$duree);
         }
         function GetEmprunt()
         {
           include_once 'conn.php';
           $teacher = new conn();
          return $teacher->EmpTeacher();
         }
         function Count()
         {
           include_once 'conn.php';
           $conn = new conn();
          return $conn->CountTeacher();
         }
         function GetoneEmprunte($id_vol)
         {
           include_once 'conn.php';
           $conn = new conn();
         return $conn->GetEmpEns($id_vol);
         }

    }

?>
