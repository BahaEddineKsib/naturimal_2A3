<?php
include "../config.php";
class AccessC {


        function afficherAccessoire(){

            $sql="SElECT * From accessoires a join type t on a.type=t.id_type" ;
            $db = config::getConnexion();
            try{
                $liste=$db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
    function supprimerAccess($nom){
        $sql="DELETE FROM accessoires where nom= :nom";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':nom',$nom);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajouterAccess($access){
        $sql="insert into accessoires (id,nom,type,prix,image,vendeur,qte )
 values (:id, :nom, :type,:prix,:image,:vendeur, :qte )";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $id=$access->getId();
            $nom=$access->getNom();
            $type=$access->getType();
            $prix=$access->getPrix();
            $image=$access->getImage();
            $vendeur=$access->getVendeur();
            $qte=$access->getQte();

            $req->bindValue(':id',$id);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':type',$type);
            $req->bindValue(':prix',$prix);
            $req->bindValue(':image',$image);
            $req->bindValue(':vendeur',$vendeur);
            $req->bindValue(':qte',$qte);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }


    function modifierAccess($access,$id){
        $sql="UPDATE accessoires SET id=:id_h, nom=:nom,type=:type,prix=:prix,image=:image,vendeur=:vendeur, qte=:qte WHERE id=:id";

        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);
            $id_h=$access->getId();
            $nom=$access->getNom();
            $type=$access->getType();
            $prix=$access->getPrix();
            $image=$access->getImage();
            $vendeur=$access->getVendeur();
            $qte=$access->getQte();
            $datas = array(':id_h'=>$id_h, ':id'=>$id, ':nom'=>$nom,':type'=>$type,':prix'=>$prix,':image'=>$image,':vendeur'=>$vendeur,':qte'=>$qte);
            $req->bindValue(':id_h',$id_h);
            $req->bindValue(':id',$id);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':type',$type);
            $req->bindValue(':prix',$prix);
            $req->bindValue(':image',$image);
            $req->bindValue(':vendeur',$vendeur);
            $req->bindValue(':qte',$qte);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }

    function recupererAccess($id){
        $sql="SELECT * from accessoires a join type t on a.type=t.id_type where a.id=$id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function moinsCherAccess(){

        $sql="SElECT * From accessoires a join type t on a.type=t.id_type order by prix" ;
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function QteAccess(){

        $sql="SElECT * From accessoires a join type t on a.type=t.id_type order by qte" ;
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function NomAccess(){

        $sql="SElECT * From accessoires a join type t on a.type=t.id_type order by nom" ;
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    public function getAccessByNom($nom) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM accessoires WHERE nom = :nom'
            );
            $query->execute([
                'nom' => $nom
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
       //**************************************
    function rechercheAccess($nom){

        $sql="SElECT * From accessoires a join type t on a.type=t.id_type where a.nom=:nom" ;
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':nom',$nom);
        try{
            $liste=$query->execute();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function rechercheAccess1($nom) {
        $sql = "SELECT * from accessoires where nom=:nom";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':nom',$nom);
        try {

            $query->execute();
            $result = $query->fetchAll();
           return $result;
        }
        catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function countAccess()
    {
        $pdo = config::getConnexion();

        $stmt=$pdo->prepare("SELECT COUNT(*) FROM accessoires");
        $stmt->execute();

        $row=$stmt->fetchColumn();

        return $row;

    }

    //**************************Aliment*********************************

    function afficherAliment(){

        $sql="SElECT * From aliments a join type t on a.type=t.id_type " ;
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerAliment($nom){
        $sql="DELETE FROM aliments where nom= :nom";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':nom',$nom);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajouterAliment($aliment){
        $sql="insert into aliments (id,nom,type,prix,image,vendeur,qte )
 values (:id, :nom, :type,:prix,:image,:vendeur, :qte )";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
            $id=$aliment->getId();
            $nom=$aliment->getNom();
            $type=$aliment->getType();
            $prix=$aliment->getPrix();
            $image=$aliment->getImage();
            $vendeur=$aliment->getVendeur();
            $qte=$aliment->getQte();

            $req->bindValue(':id',$id);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':type',$type);
            $req->bindValue(':prix',$prix);
            $req->bindValue(':image',$image);
            $req->bindValue(':vendeur',$vendeur);
            $req->bindValue(':qte',$qte);


            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }


    function modifierAliment($aliment,$id){
        $sql="UPDATE aliments SET id=:id_h, nom=:nom,type=:type,prix=:prix,image=:image,vendeur=:vendeur,qte=:qte WHERE id=:id";

        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);
            $id_h=$aliment->getId();
            $nom=$aliment->getNom();
            $type=$aliment->getType();
            $prix=$aliment->getPrix();
            $image=$aliment->getImage();
            $vendeur=$aliment->getVendeur();
            $qte=$aliment->getQte();
            $datas = array(':id_h'=>$id_h, ':id'=>$id, ':nom'=>$nom,':type'=>$type,':prix'=>$prix,':image'=>$image,':vendeur'=>$vendeur,':qte'=>$qte);
            $req->bindValue(':id_h',$id_h);
            $req->bindValue(':id',$id);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':type',$type);
            $req->bindValue(':prix',$prix);
            $req->bindValue(':image',$image);
            $req->bindValue(':vendeur',$vendeur);
            $req->bindValue(':qte',$qte);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }

    function recupererAliment($id){
        $sql="SELECT * from aliments a join type t on a.type=t.id_type where a.id=$id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function moinsCherAliment(){

        $sql="SElECT * From aliments a join type t on a.type=t.id_type order by prix" ;
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    public function countAliment()
    {
        $pdo = config::getConnexion();

        $stmt=$pdo->prepare("SELECT COUNT(*) FROM aliments");
        $stmt->execute();

        $row=$stmt->fetchColumn();

        return $row;

    }

    function QteAliment(){

        $sql="SElECT * From aliments a join type t on a.type=t.id_type order by qte" ;
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function NomAliment(){

        $sql="SElECT * From aliments a join type t on a.type=t.id_type order by nom" ;
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    //**************************************************type*************
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

    function modifierType($type,$id){
        $sql="UPDATE type SET id_type=:id_type,type=:type1 WHERE id_type=:id";

        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);
            $id_type=$type->getId();
            $type1=$type->getType();
            $datas = array(':id_h'=>$id_type, ':id'=>$id,':type1'=>$type1);
            $req->bindValue(':id_type',$id_type);
            $req->bindValue(':id',$id);
            $req->bindValue(':type1',$type1);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }



}


    ?>