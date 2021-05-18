<?php
require_once "../../config1.php";
class Hebergements{
    public function AfficherHeberg() {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement'
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function TrierAsc() {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement ORDER BY Prix ASC'
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function TrierDesc() {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement ORDER BY Prix DESC'
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function RechercheHeb($noun) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement WHERE Nom LIKE %$noun% '
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getHebergByIdRATING($id) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement INNER JOIN ratings ON hebergement.Id=ratings.Heberg WHERE hebergement.Id = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getHebergById($id) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement WHERE Id = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getHebergByName($nom) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement WHERE Nom LIKE :nom'
            );
            $query->execute([
                'nom' => $nom
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>