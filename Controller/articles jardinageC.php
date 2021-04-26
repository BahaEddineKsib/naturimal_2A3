<?php
    require_once "C:/xampp/htdocs/GestionBotanique/config.php";
    class articles_JardinageC{
        public function afficherArticlesJardinage() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM articlejardinage'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getArticleById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM articlejardinage WHERE IdArticle = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getArticleByName($Nom) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM articlejardinage WHERE NomArticle = :Nom'
                );
                $query->execute([
                    'Nom' => $Nom
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function AjouterArticleJardinage($Art) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO articlejardinage (IdCategorie,NomArticle,ImageArticle,Description,PrixArticle,QuantiteArticle) 
                VALUES (:IdCategorie, :NomArticle, :ImageArticle,:Description,:PrixArticle,:QuantiteArticle)'
                );
                $query->execute([
                //'IdArticle' =>$Art->getIdArticle(),
                'IdCategorie' => $Art->getIdCategorieArticle(),
                 'NomArticle' => $Art->getNomArticle(),
                 'ImageArticle' => $Art->getImageArticle(),
                 'Description' => $Art->getDescriptionArticle(),
                 'PrixArticle' => $Art->getPrixArticle(),
                 'QuantiteArticle' => $Art->getQuantiteArticle()
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function UpdateArticle($Art, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE articlejardinage SET IdCategorie= :IdCategorie,NomArticle=:NomArticle,
                     ImageArticle=:ImageArticle,Description = :Description,PrixArticle=:PrixArticle,QuantiteArticle=:QuantiteArticle
                     WHERE IdArticle = :id'
                );
                $query->execute([
                'IdCategorie' => $Art->getIdCategorieArticle(),
                'NomArticle' => $Art->getNomArticle(),
                'ImageArticle' => $Art->getImageArticle(),
                'Description' => $Art->getDescriptionArticle(),
                'PrixArticle' => $Art->getPrixArticle(),
                'QuantiteArticle' => $Art->getQuantiteArticle(),
                'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function DeleteArticle($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM articlejardinage WHERE IdArticle = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function RechercherArticle($Nom) {            
            $sql = "SELECT * from articlejardinage where NomArticle=:Nom"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'NomArticle' => $Art->getNomArticle(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function TriArticles(){
            try{
                $pdo=getConnexion();
                $query=$pdo->prepare("SELECT * FROM articlejardinage ORDER BY PrixArticle");
                $query->execute();
                return $query->fetchAll();
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        
    }
    