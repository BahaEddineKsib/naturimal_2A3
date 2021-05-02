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
    public function update_visiteurs($NbVisiteurs){
        try{
            $pdo=getConnexion();
            $query=$pdo->prepare('UPDATE visiteurs SET NbVisiteurs WHERE NbVisiteurs=:NbVisiteurs');
            $query->execute([
                'NbVisiteurs'=> $NbVisiteurs
            ]);
            echo "update visiteurs success";
            return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>