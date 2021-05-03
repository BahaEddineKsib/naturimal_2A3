<?php 
class Ratings {
    private int $Id;
    private int $Stars;
    private string $Comment;
    private int $User;
    private int $Heberg;
    public function __construct($Id,$Stars,$Comment,$User,$Heberg){

        $this->Id=$Id;
        $this->Stars=$Stars;
        $this->Comment=$Comment;
        $this->User=$User;
        $this->Heberg=$Heberg;
    }

    public function getId(){
        return $this->Id;
    }
    public function getStars(){
        return $this->Stars;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getComment(){
        return $this->Comment;
    }
    public function getUser(){
        return $this->User;
    }
    public function getHeberg(){
        return $this->Heberg;
    }


    public function setId($Id){
        $this->Id = $Id;
    }
    public function setStars($Stars){
        $this->Stars = $Stars;
    }
    public function setComment($Comment){
        $this->Comment = $Comment;
    }
    public function setUser($User){
        $this->User = $User;
    }
    public function setAdresse($Heberg){
        $this->Heberg = $Heberg;
    }
}
?>