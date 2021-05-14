<?php
require_once "../../config1.php";
class Ratingc{
    public function afficherRatings() {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM rating'
            );
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getRatingsById($id) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM rating WHERE Id = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getUSr($id) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM utilisateur WHERE Id_utilisateur = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getRatingsByHeb($id) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM rating WHERE Heberg = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getRatingsByUser($User) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM rating WHERE User = :User'
            );
            $query->execute([
                'User' => $User
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function DeleteRating($id) {

        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'DELETE FROM rating WHERE Heberg = :id AND User = 1'
            );
            $query->execute([
                'id' => $id,
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

?>