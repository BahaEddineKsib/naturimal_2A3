<?php
require_once "../Connection.php";
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

    public function getHebergById($id) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM hebergement INNER JOIN rating ON hebergement.Id=rating.Heberg WHERE hebergement.Id = :id'
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