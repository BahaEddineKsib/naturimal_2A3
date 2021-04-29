<?php
class visiteurs{
    private int $NbVisiteurs;
    public function __construct($NbVisiteurs){
        $this->NbVisiteurs=$NbVisiteurs;
    }

    public function getNbVisiteurs(){
        return $this->NbVisiteurs;
    } 
    public function setNbVisiteurs ($NbVisiteurs){
        $this->NbVisiteurs = $NbVisiteurs;
    }


   
}



?>