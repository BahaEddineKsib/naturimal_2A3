<?php
 require_once "C:/xampp/htdocs/naturimal_2A3/config1.php";
 require_once "C:/xampp/htdocs/naturimal_2A3/views/Front/panier.class.php";
require_once "C:/xampp/htdocs/naturimal_2A3/Model/reclamationM.php";

$panier = new panier();

class reclamationC
{

    public function afficher_reclamation()
    {
        $db = getConnexion();
        try {
            $query = $db->prepare('SELECT * FROM reclamation');
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function ajouter_reclamation($product_id)
    {
        $db = getConnexion();
        $ids = explode(" ", $product_id);
        $id_produit = $ids[0];
        $id_commande = $ids[1];
        $type_article = $ids[2];

        try {
            $req = $db->prepare('SELECT * FROM UTILISATEUR WHERE Email =:em');
            $req->bindValue(':em', $_SESSION['user']);
            $req->execute();
            $res = $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $e->getMessage();
        }

        foreach ($res as $r) {
            $firstname = $r->FirstName;
            $lastname = $r->LastName;
            $email = $r->Email;
        }

        try {
            $req = $db->prepare('SELECT * FROM reclamation WHERE idproduit =:id AND id_commande=:id_c AND typeproduit=:tp');
            $req->bindValue(':id', $id_produit);
            $req->bindValue(':id_c', $id_commande);
            $req->bindValue(':tp', $type_article);
            $req->execute();
            $res = $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $e->getMessage();
        }

        foreach ($res as $r) {
            $id = $r->idproduit;
        }

        $rec = new reclamation($firstname, $lastname, $email, $id_commande, $id_produit, $type_article);
        if (empty($id)) {
            try {
                $query = $db->prepare(
                    'INSERT INTO reclamation (nom, prenom, email, id_commande, idproduit, typeproduit)
                    VALUES (:nom, :prenom, :email, :id_commande, :idproduit, :typeproduit)'
                );
                $query->bindValue(':nom', $rec->getnom());
                $query->bindValue(':prenom', $rec->getprenom());
                $query->bindValue(':email', $rec->getemail());
                $query->bindValue(':id_commande', $rec->getidcommande());
                $query->bindValue(':idproduit', $rec->getidproduit());
                $query->bindValue(':typeproduit', $rec->gettypeproduit());
                $query->execute();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        } else {
        }
    }


    public function get_id_commandes_in_reclamation()
    {
        $db = getConnexion();
        try {
            $req = $db->prepare('SELECT DISTINCT id_commande FROM reclamation WHERE email=:email');
            $req->bindValue(':email',$_SESSION['user']);
            $req->execute();
            $ids_commandes = $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $ids_commandes;
    }

    public function get_reclamation_for_complaints($email,$id,$type_produit){
        $db = getConnexion();
        try {
            $req = $db->prepare('SELECT * FROM reclamation WHERE email =:em AND id_commande=:id_c AND typeproduit=:tp');
            $req->bindValue(':em', $email);
            $req->bindValue(':id_c', $id);
            $req->bindValue(':tp', $type_produit);
            $req->execute();
            $products = $req->fetchAll(PDO::FETCH_OBJ);
          } catch (PDOException $e) {
            $e->getMessage();
          }
          return $products;
    }
}
