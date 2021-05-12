<?php

    class Libelle{
        public $id_cat;
        public $liblecat;
        
        
        
        public function  __construct($id,$lib){
            $this->id_cat=$id;
	     	$this->libelecat=$lib;  
            
        }

        public function addtodata(){
            include_once("conn.php");
            $con=new conn();
		    $con->ajouterCategorie($this->$id_cat,$this->$liblecat);
              
        }

        public function delete(){
          include_once("conn.php");
          $con=new conn();
          $con->supprimerCategorie($this->$id_cat);
        }
        
    
    }

?>