<?php 
class articles_jardinage {
    private int $IdArticle;
    private int $IdCategorie;
    private string $NomArticle;
    private string $ImageArticle;
    private string $Description;
    private float $PrixArticle;
    private int $QuantiteArticle;

    public function __construct($IdCategorie,$NomArticle,$ImageArticle,$Description,$PrixArticle,$QuantiteArticle){
        //$this->IdArticle=$IdArticle;
        $this->IdCategorie=$IdCategorie;
        $this->NomArticle=$NomArticle;
        $this->ImageArticle=$ImageArticle;
        $this->Description=$Description;
        $this->PrixArticle=$PrixArticle;
        $this->QuantiteArticle=$QuantiteArticle;
    }

    //getters
    public function getIdArticle(){
        return $this->IdArticle;
    }
    public function getIdCategorieArticle(){
        return $this->IdCategorie;
    }
    public function getNomArticle(){
        return $this->NomArticle;
    }
    public function getImageArticle(){
        return $this->ImageArticle;
    }
    public function getDescriptionArticle(){
        return $this->Description;
    }
    public function getPrixArticle(){
        return $this->PrixArticle;
    }
    public function getQuantiteArticle(){
        return $this->QuantiteArticle;
    }

    //setters
    public function setIdArticle ($IdArticle){
        $this->IdArticle = $IdArticle;
    }
    public function setCategorieArticle ($IdCategorie){
        $this->IdCategorie = $IdCategorie;
    }
    public function setINomArticle ($NomArticle){
        $this->NomArticle = $NomArticle;
    }
    public function setImageArticle ($ImageArticle){
        $this->ImageArticle = $ImageArticle;
    }
    public function setDescriptionArticle($Description){
        return $this->Description;
    }
    public function setPrixArticle ($PrixArticle){
        $this->PrixArticle = $PrixArticle;
    }
    public function setQuantiteArticle($QuantiteArticle){
        $this->QuantiteArticle=$QuantiteArticle;
    }


}
?>