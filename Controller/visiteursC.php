<?php
    require_once "C:/xampp/htdocs/GestionBotanique/config.php";
    class visiteursC{
    public function nombre_visiteurs(){
        try
        {
         $pdo=getConnexion();
         $query=$pdo->prepare('SELECT * FROM visiteurs');
         $query->execute();
         $result= $query->fetchAll();
         return $result;
        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>