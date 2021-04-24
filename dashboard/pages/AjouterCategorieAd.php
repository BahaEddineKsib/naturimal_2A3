<?php
  include_once "../../config.php";

include "../../Model/categorie.php";
include "../../Controller/categorieC.php";


$error = "";

$categorie = null;

// create an instance of the controller
$categorieC = new categorieC();
if (
    isset($_POST["IdCategorie"]) &&
    isset($_POST["NomCategorie"]) &&
    isset($_POST["Description"]) 
) {
        $categorie = new categorie(
            $_POST['IdCategorie'],
            $_POST['NomCategorie'],
            $_POST['Description']
  
        );
        $categorieC-> AjouterCategorie($categorie);
       header('Location:AfficherCategoriesAd.php');
    }
    else
        $error = "Missing information";

?>

<HTML>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        </head>
        <body>
            <script src="control.js"> </script>   
        <link rel="stylesheet" href="assets/css/ajouter.css">
        <div class="container">  
          <form id="categorie" name="formulaire categorie"  method="post">
            <h3>Ajouter une categorie</h3>
            <h4>Ajouter une categorie à la base de donnees</h4>
            
            <fieldset>
              <input placeholder="Id Categorie" type="text" tabindex="1" name="IdCategorie" id="IdCategorie" readonly>
            </fieldset>
            <fieldset>
              <input placeholder="Nom de la categorie" type="text" tabindex="2" name="NomCategorie" id="NomCategorie" required>
            </fieldset>
            <fieldset>
              <input placeholder="Description" type="text" tabindex="3" name="Description" id="Description" required>
            </fieldset>
            <fieldset>
              <button name="submit" type="submit" value="submit" id="categorie submit">Submit</button>
            </fieldset>
            <fieldset>
              <button formaction="AfficherCategoriesAd.php"><a href="AfficherArticleAd.php"></a>Cancel</button>
            </fieldset>
          </form >         
        </div>
        
        
         
        
        </body>
        </HTMl>