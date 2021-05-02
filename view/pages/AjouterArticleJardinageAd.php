
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
    isset($_POST["DescriptionArticle"]) &&
    isset($_POST["PrixArticle"]) &&
    isset ($_POST['QuantiteArticle']) 
) {
        $article = new articles_jardinage(
           // $_POST['IdArticle'],
            $_POST['IdCategorieArticle'],
            $_POST['NomArticle'],
            $_POST['ImageArticle'],
            $_POST['DescriptionArticle'],
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
            <title> Ajouter article</title>

</head>

<body>


        <link rel="stylesheet" href="assets/css/ajouter.css">
        <div class="container">  
        <form id="AjoutArticle" method="post" name='MonForm' onsubmit="return valider()" >
            <h3>Ajouter un article de jardinage</h3>
            <h4>Ajouter un article de jardinage à la base de données</h4>
            <fieldset>
                <!--<input placeholder="Id de l'article" type="text" tabindex="1" name="IdArticle" id="IdArticle" >
            </fieldset>-->
            <fieldset>
                <label for="Id Categorie">Id categorie: </label>
                <input placeholder="Id categorie" type="text" tabindex="2" name="IdCategorieArticle" id="IdCategorieArticle" >
            </fieldset>
            <fieldset>
            <label for="NomArticle">Nom article: </label>
                <input placeholder="Nom article" type="text"  tabindex="3" name="NomArticle" id="NomArticle" >
            </fieldset>
            <fieldset>
            <label for="ImageArticle">Image Article: </label>
                <input placeholder="photo" type="file" tabindex="4" name="ImageArticle" accept="image/png, image/jpeg" id="ImageArticle" >
             </fieldset>
            <fieldset>
            <label for="Description">Description: </label>
                <textarea placeholder="Description de l'article" tabindex="5" name="Description" id="Description" pattern="[0-9a-zA-Z-\.]{0,12}"></textarea>
            </fieldset>
            <fieldset>
            <label for="PrixArticle">Prix Article: </label>
                <input placeholder="Prix de l'article" type="text" tabindex="6" name="PrixArticle" id="PrixArticle" >
            </fieldset>
            <fieldset>
            <label for="QuantiteArticle">Quantite Article: </label>
                <input placeholder="Quantite de l'article" type="text" tabindex="7" name="QuantiteArticle" id="QuantiteArticle" >
            </fieldset>
            <br><br>
            <fieldset>
            <p id="erreur"></p>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="submit" class="btn btn-warning" >Submit</button>
            </fieldset> 
            <fieldset>           
            <button><a href="AfficherArticleAd.php" class="btn btn-warning"></a>Cancel</button>
            </fieldset>           

        </form>

    </div>
    <SCRIPT LANGUAGE="JavaScript">
    function valider() 
    {
    var IdCategorieArticle=window.document.MonForm.IdCategorieArticle.value;
    var NomArticle=window.document.MonForm.NomArticle.value;
    var Description=window.document.MonForm.Description.value;
    var PrixArticle=window.document.MonForm.PrixArticle.value;
    var QuantiteArticle=window.document.MonForm.QuantiteArticle.value;
    if((IdCategorieArticle=="") || (Description=="") || (PrixArticle=="") || (QuantiteArticle=="")||(NomArticle=="")){
        alert ("verifier les champs");
        return false; 
    } 
    if(NomArticle.charAt(0)<'A' || NomArticle.charAt(0)>'Z'){
        alert ("Le nom doit commencer par une lettre Majuscule");
        return false;
    }
    if(QuantiteArticle>10){
        alert("la quantite ne doit pas dépasser 10");
        return false;
    }
    if(IdCategorieArticle.length>3){
        alert("Id ne doit pas depasser 3 chiffres");
        return false;
    }
    else return true;
}
</SCRIPT></body>
</HTMl>

