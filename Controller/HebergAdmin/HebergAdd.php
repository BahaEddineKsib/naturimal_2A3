<?php
require_once '../../config1.php';

if( isset($_POST['AddHeb']))
{
    $Nom = $_POST['name'];
    $Email = $_POST['email'];
    $Adresse = $_POST['address'];
    $Prix = $_POST['prix'];
    $Image = $_FILES['image_link'];
    $Description = $_POST['details'];
    try
    {
        $pdo = getConnexion();
        $query =$pdo->prepare("INSERT INTO `hebergement` (`Nom`, `Email`, `Prix`, `Adresse`, `Description`,`Image` ) VALUES (:Nom, :Email, :Prix, :Adresse, :Descriptions, :Images)");
    
        $query->bindValue(':Nom',$Nom);
        $query->bindValue(':Images',$Image);
        $query->bindValue(':Email',$Email);
        $query->bindValue(':Prix', $Prix);
        $query->bindValue(':Adresse', $Adresse);
        $query->bindValue(':Descriptions',$Description);
        $query->execute();

    }catch(PDOException $error){$error->getMessage();}
}
    ?>