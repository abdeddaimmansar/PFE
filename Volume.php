<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}

 class Volume{

        public $titre;
        public $image;
        public $auteur;
        public $editeur;
        public $emplace;
        public $statut;
        public $id_cat;


         public function  __construct(){}
        public function  __newEntry($tit,$img,$aut,$ed,$emp,$stat,$id){
             $this->titre=$tit;
            $this->image=$img;
            $this->auteur=$aut;
            $this->editeur=$ed;
            $this->emplace=$emp;
            $this->statut=$stat;
            $this->id_cat = $id;
        }

        public function addtodata(){
            include_once("conn.php");
            $con=new conn();
            echo "__relly??. ".$this->titre." ".$this->image." ".$this->auteur." ".$this->editeur." ".$this->emplace." ".$this->statut;
           $con->ajouterVolume($this->titre,$this->image,$this->auteur,$this->editeur,$this->emplace,$this->statut);
        }

        function Reservation()
        {
           
          include_once 'conn.php';
          $conn = new conn();
          return $conn->Reservation();
        }

    }

    class Livre extends Volume{
         public function  __construct(){}
        public function newEntry($tit,$img,$aut,$ed,$emp,$sta,$id){
        parent:: __newEntry($tit,$img,$aut,$ed,$emp,$sta,$id);


       }

        function addtodata(){
            include_once("conn.php");
            $con=new conn();
            parent:: addtodata();

            $con->ajouterLivre($this->id_cat);
        }
        function listeLivres()
        {
          include_once 'conn.php';
          $conn = new conn();
        return $conn->listeLivres();

        }
        function getlivre($id)
        {
          include_once 'conn.php';
          $conn = new conn();
        return $conn->GetLivre($id);
        }
        function updatelivre($id_vol)
        {
          include_once 'conn.php';
          $conn = new conn();
          $conn->UpdateLivre($id_vol,$this->id_cat,$this->titre,$this->image,$this->auteur,$this->editeur,$this->emplace,$this->statut);

        }


    }

   class Polycope extends Volume{
         public function  __construct(){}
        public function  newEntry($tit,$img,$aut,$ed,$emp,$stat,$id_cat){
                 parent::__newEntry($tit,$img,$aut,$ed,$emp,$stat,$id_cat);

       }

        function addtodata(){
          include_once("conn.php");
            $con=new conn();
            parent:: addtodata();
            $con->ajouterPolycope($this->id_cat);


        }
        function listePolycopes()
        {
          include_once 'conn.php';
          $conn = new conn();

        return $conn->listePolycopes();

        }
        function getpoly($id)
        {
          include_once 'conn.php';
          $conn = new conn();

        return $conn->GetPolycope($id);

        }
        function updatepolycope($id_p)
        {
          include_once 'conn.php';
          $conn = new conn();
          $conn->UpdatePoly($id_p,$this->id_cat,$this->titre,$this->image,$this->auteur,$this->editeur,$this->emplace,$this->statut);
        }




    }
    class Dictionnaire extends Volume{
        public $lang;
        function __construct(){}
        function newEntry($tit,$img,$aut,$ed,$emp,$stat,$lang) {
            parent::__newEntry($tit,$img,$aut,$ed,$emp,$stat,0);

             $this->lang=$lang;
        }
          public  function addtodata()
        {
           include_once("conn.php");
           $connn = new conn();
            parent:: addtodata();
            echo "****";
           $connn->ajouterDictionnaire($this->lang);


        }
        function listeDictionnaires()
        {
          include_once 'conn.php';
          $conn = new conn();
        return $conn->listeDictionnaires();

        }
        function getdic($id)
        {
          include_once 'conn.php';
          $conn = new conn();
         return $conn->GetDictionnaire($id);

        }
        function upadateDic($id)
        {
          include_once 'conn.php';
          $conn = new conn();
          $conn->updateDic($id,$this->titre,$this->image,$this->auteur,$this->editeur,$this->emplace,$this->statut,$this->lang);
        }

      }

?>
