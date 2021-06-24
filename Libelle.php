<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}

    class Libelle{
        public $id_cat;
        public $liblecat;
        function __construct(){}


        public function  newEntry($id,$lib){
            $this->id_cat=$id;
	        	$this->liblecat=$lib;

           }

        public function addtodata(){

            include_once("conn.php");
            $con=new conn();



		     $con->ajouterCategorie($this->id_cat,$this->liblecat);

        }

        public function delete(){
          include_once("conn.php");
          $con=new conn();
          $con->supprimerCategorie($this->$id_cat);
        }
       public function GetCats()
        {
           include_once("conn.php");
           $conn = new conn();
           return $conn->listecat();

        }
        public function listeCategorie($cin)
        {
          include_once 'conn.php';
          $conn = new conn();
          return $conn->GetCat($cin);
        }
        public function updateCat($id)
        {
          include_once 'conn.php';
          $conn = new conn();
          echo "string";
           $conn->updateCat($id,$this->id_cat,$this->liblecat);
        //   header("location: categorie.php");
        }


    }

?>
