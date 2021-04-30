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
    public function update_visiteurs($nv_visiteurs){
        try{
            $pdo=getConnexion();
            $query=$pdo->prepare('UPDATE visiteurs SET NbVisiteurs WHERE NbVisiteurs=:nv_visiteurs');
            $query->execute([
                'nv_visiteurs'=>$nv_visiteurs
            ]);
            echo "update visiteurs success";
            return $query->fetch();
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>