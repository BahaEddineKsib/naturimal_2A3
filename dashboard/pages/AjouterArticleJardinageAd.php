
<?php
include "../../Model/articles jardinage.php";
include "../../Controller/articles JardinageC.php";


$error = "";

// create user
$article = null;

// create an instance of the controller
$articleC = new articles_jardinageC();
if (
    //isset($_POST["IdArticle"]) &&
    isset($_POST["IdCategorieArticle"]) &&
    isset($_POST["NomArticle"]) &&
    isset($_POST["ImageArticle"]) &&
    isset($_POST["Description"]) &&
    isset($_POST["PrixArticle"]) &&
    isset ($_POST['QuantiteArticle'])
) {
        $article = new articles_jardinage(
           // $_POST['IdArticle'],
            $_POST['IdCategorieArticle'],
            $_POST['NomArticle'],
            $_POST['ImageArticle'],
            $_POST['Description'],
            $_POST['PrixArticle'],
            $_POST['QuantiteArticle']
        );
        $articleC->AjouterArticleJardinage($article);
        header('Location:AfficherArticlesJardinageAd.php');
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
        <form id="article" method="post" name='ajout article'>
            <h3>Ajouter un article de jardinage</h3>
            <h4>Ajouter un article de jardinage à la base de données</h4>
            <fieldset>
                <!--<input placeholder="Id de l'article" type="text" tabindex="1" name="IdArticle" id="IdArticle" >
            </fieldset>-->
            <fieldset>
                <input placeholder="Id categorie" type="text" tabindex="2" name="IdCategorieArticle" id="IdCategorieArticle" required>
            </fieldset>
            <fieldset>
                <input placeholder="Nom article" type="text"  tabindex="3" name="NomArticle" id="NomArticle" required>
            </fieldset>
            <fieldset>
                <input placeholder="photo" type="file" tabindex="4" name="ImageArticle" accept="image/png, image/jpeg" id="ImageArticle" required>
             </fieldset>
            <fieldset>
                <textarea placeholder="Description de l'article" tabindex="5" name="Description" id="Description" required></textarea>
            </fieldset>
            <fieldset>
                <input placeholder="Prix de l'article" type="text" tabindex="6" name="PrixArticle" id="PrixArticle" required>
            </fieldset>
            <fieldset>
                <input placeholder="Quantite de l'article" type="text" tabindex="7" name="QuantiteArticle" id="QuantiteArticle" required>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" >Submit</button>
            </fieldset> 
            <fieldset>           
            <button><a href="AfficherArticleAd.php"></a>Cancel</button>
            </fieldset>           

        </form>

    </div>
</body>
</HTMl>

