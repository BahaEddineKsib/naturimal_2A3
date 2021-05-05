<?php
require_once "../Connection.php";
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

    public function AjouterRating($heberg) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'INSERT INTO rating (Stars,Comment,User,Heberg) 
                VALUES (:Stars, :Comment, :User,:Heberg)'
            );
            $query->execute([
                //'IdArticle' =>$Art->getIdArticle(),
                'Stars' => $Rating->getIdCategorieArticle(),
                'Comment' => $Rating->getNomArticle(),
                'User' => $Rating->getImageArticle(),
                'Heberg' => $heberg,
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function UpdateRating($id, $heberg) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'UPDATE rating SET Stars=:Stars,Comment=:Comment,User = :User,Heberg=:Heberg WHERE Id = :id'
            );
            $query->execute([
                'Stars' => $Rating->getIdCategorieArticle(),
                'Comment' => $Rating->getNomArticle(),
                'User' => $Rating->getImageArticle(),
                'Heberg' => $heberg,
                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully";
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