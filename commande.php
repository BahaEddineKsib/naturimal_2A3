<?php

class commande 
{
    private $nom;
    private $prenom;
    private $email;
    private $total;
    private $adresse;

    private $idproduit1;
    private $qtproduit1;
    private $nomproduit1;

    private $idproduit2;
    private $qtproduit2;
    private $nomproduit2;

    private $idproduit3;
    private $qtproduit3;
    private $nomproduit3;

    private $idproduit4;
    private $qtproduit4;
    private $nomproduit4;

    private $idproduit5;
    private $qtproduit5;
    private $nomproduit5;

    private $idproduit6;
    private $qtproduit6;
    private $nomproduit6;


    public function __construct($nom,$prenom,$email,$total,$adresse,$idproduit1,$qtproduit1,$nomproduit1,$idproduit2,$qtproduit2,$nomproduit2,$idproduit3,$qtproduit3,$nomproduit3,$idproduit4,$qtproduit4,$nomproduit4,$idproduit5,$qtproduit5,$nomproduit5,$idproduit6,$qtproduit6,$nomproduit6){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->total=$total;
        $this->adresse=$adresse;

        $this->idproduit1=$idproduit1;
        $this->qtproduit1=$qtproduit1;
        $this->nomproduit1=$nomproduit1;

        $this->idproduit2=$idproduit2;
        $this->qtproduit2=$qtproduit2;
        $this->nomproduit2=$nomproduit2;

        $this->idproduit3=$idproduit3;
        $this->qtproduit3=$qtproduit3;
        $this->nomproduit3=$nomproduit3;

        $this->idproduit4=$idproduit4;
        $this->qtproduit4=$qtproduit4;
        $this->nomproduit4=$nomproduit4;

        $this->idproduit5=$idproduit5;
        $this->qtproduit5=$qtproduit5;
        $this->nomproduit5=$nomproduit5;

        $this->idproduit6=$idproduit6;
        $this->qtproduit6=$qtproduit6;
        $this->nomproduit6=$nomproduit6;
    }

    // public function getidcommande(){
    //     return $this->idcommande;
    // }

    // public function setidcommande($idcommande){
    //     $this->idcommande = $idcommande;
    // }
}


?>