<?php

 class Volume{
        public $id_Vol;
        public $titre;
        public $image;
        public $auteur;    
        public $editeur;
        public $emplace;
        public $statut;
       


        public function  __construct($id,$tit,$img,$aut,$ed,$emp,$stat){
            $this->id_Vol=$id;
            $this->titre=$tit;
            $this->image=$img;
            $this->auteur=$aut;
            $this->editeur=$ed;
            $this->emplace=$emp;
            $this->statut=$stat;
        }

        public function addtodata(){
            include_once("conn.php");
            $con=new conn();
            $con->ajouterVolume($this->id_Vol,$this->titre,$this->image,$this->auteur,$this->editeur,$this->emplace,$this->statut);
        }

    }

    class Livre extends Volume{

        public function  __construct($id_Vol,$tit,$img,$aut,$ed,$emp,$stat){
        parent::__construct($id_Vol,$tit,$img,$aut,$ed,$emp,$stat);

       }

        function addtodata(){
            include_once("conn.php");
            $con=new conn();
            parent:: addtodata();
            $con->ajouterLivre($this->id_Vol);
        }


    }

    class Polycope extends Volume{

        public function  __construct($id_Vol,$tit,$img,$aut,$ed,$emp,$stat){
        parent::__construct($id_Vol,$tit,$img,$aut,$ed,$emp,$stat);

       }

        function addtodata(){
            include_once("conn.php");
            $con=new conn();
            parent:: addtodata();
            $con->ajouterPolycope($this->id_Vol);
        }


    }
   class Dictionnaire extends Volume{
        public $lang;
      
        function __construct($id_Vol,$tit,$img,$aut,$ed,$emp,$stat,$lang) {
            parent::__construct($id_Vol,$tit,$img,$aut,$ed,$emp,$stat);
      
             $this->lang=$lang;
        }
          public  function addtodata()
        {  
           include_once("conn.php");
           $connn = new conn();
            parent:: addtodata();
           $connn->ajouterDictionnaire($this->lang,$this->id_Vol);
      
      
        }
      }

?>
