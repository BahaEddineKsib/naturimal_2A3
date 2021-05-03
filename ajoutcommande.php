<?php
require 'connection.php';
require "panier.class.php";
require "commande.php";
$panier = new panier();
$db = conn();
 if ( empty($_SESSION['user'])){
     header('location: login.php');
 }
else{    
    if ( isset($_POST['submit']))
    {
        $state = $_POST['state'];
        $street = $_POST['street'];
        $town = $_POST['town'];
        $zip = $_POST['zip'];
        $total = $_SESSION['total'][1];
    
        $adresse = $state . " " . $street ." " . $town ." " . $zip;
    
        $ids = array_keys($_SESSION['panier']);
        $temps = array_fill(count($ids),6-count($ids),0);
    
        $products = $panier->product_table($db, $ids);
        $nomproduits = array_fill(0,6,'0');
        $i=0;
        foreach($products as $product){
            $nomproduits[$i] = $product->name;
            $i++;
        }
        sort($ids);
        foreach($temps as $temp){
            array_push($ids,$temp);
        }
    

    
    
        try{
            $req = $db->prepare('SELECT * FROM UTILISATEUR WHERE Id_utilisateur =:id');
            $req->bindValue(':id', $_SESSION['user'][1]);
            $req->execute();
            $res = $req->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            $e->getMessage();
        }

        foreach($res as $r){
            $firstname = $r->FirstName;
            $lastname = $r->LastName;
            $email = $r->Email;
        }


        $temp=0;
        try{
            $req = $db->prepare('SELECT id_commande FROM comande ORDER BY id_commande DESC LIMIT 1');
            $req->execute();
            $id_commandes = $req->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            $e->getMessage();
        }
        if ( empty($id_commandes)){
            $temp++;
        }else{
            foreach($id_commandes as $id_c){
                $temp = $id_c->id_commande;
            }
            $temp ++;
        }
 




        for ( $i = 0 ; $i < count($_SESSION['panier']) ; $i++){
        try{
            $query = $db->prepare(
                'INSERT INTO COMANDE (id_commande, nom, prenom, email, total, adresse, idproduit, qtproduit, nomproduit)
                VALUES (:id, :nom, :prenom, :email, :total, :adresse, :idproduit, :qtproduit, :nomproduit)'
            );
            $query->bindValue(':id',$temp);
            $query->bindValue(':nom',$firstname);
            $query->bindValue(':prenom',$lastname);
            $query->bindValue(':email',$email);
            $query->bindValue(':total',$total);
            $query->bindValue(':adresse',$adresse);
            $query->bindValue(':idproduit',$ids[$i]);
            $query->bindValue(':qtproduit',$_SESSION['quantity'][$ids[$i]]);
            $query->bindValue(':nomproduit',$nomproduits[$i]);
            $query->execute();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

        unset($_SESSION['panier']);
        unset($_SESSION['totalindiv']);
        unset($_SESSION['quantity']);
        unset($_SESSION['total']);

        $_SESSION['panier'] = array();
        $_SESSION['totalindiv'] = array();
        $_SESSION['quantity'] = array();
        $_SESSION['total'] = array();
        header('location: index.php');
    }
 }

?>


