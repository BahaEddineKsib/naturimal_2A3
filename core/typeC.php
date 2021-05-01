<?php
include "../config.php";
class TypeC {


    function afficherType(){

        $sql="SElECT * From type" ;
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerType($id){
        $sql="DELETE FROM type where id_type= :id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajouterType($type){
        $sql="insert into type (id_type,type )
 values (:id,:type )";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $id=$type->getId();
            $type1=$type->getType();

            $req->bindValue(':id',$id);
            $req->bindValue(':type',$type1);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }


    function modifierType($type1,$id_type){
        $sql="UPDATE type SET id_type=:id_type1, type=:type WHERE id_type=:id_type";

        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);
            $id_type1=$type1->getId();
            $type=$type1->getType();
            $datas = array(':id_type1' =>$id_type1,':id_type' => $id_type,':type' => $type);
            $req->bindValue(':id_type1',$id_type1);
            $req->bindValue(':id_type',$id_type);
            $req->bindValue(':type',$type);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }

    function recupererType($id_type){
        $sql="SELECT * from type where id_type=$id_type";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    public function filtreAccessoire($id) {
        $sql = "SELECT * from accessoires a join type t on a.type=t.id_type where a.type=:id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id
            ]);
            $result = $query->fetchAll();
            return $result;
        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function filtreAliment($id) {
        $sql = "SELECT * from aliments a join type t on a.type=t.id_type  where a.type=:id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id
            ]);
            $result = $query->fetchAll();
            return $result;
        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function NomType(){

        $sql="SElECT * From type order by type" ;
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }



}