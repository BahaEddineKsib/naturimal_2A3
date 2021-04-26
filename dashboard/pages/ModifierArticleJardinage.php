<HTML> 
    <head>Modifier article jardinage</head>
<body>
    <?PHP
include "C:/xampp/htdocs/GestionBotanique/Model/articles jardinage.php";

include_once "../../config.php";
include_once "../../Controller/articles jardinageC.php";

if (isset($_GET['IdArticle'])){
	$ArtC=new articles_jardinageC();
    $result=$ArtC->getArticleById($_GET["IdArticle"]);
	foreach($result as $row){
   


     
?>
<meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="control.js"> </script>
            <link rel="stylesheet" href="assets/css/ajouter.css">
            <div class="container">  
            <form id="contact" action="" method="post" name='registration'>
            <h3>Modifier un article de jardinage</h3>
            <h4>Modifier un article de jardinage de la base de données</h4>
            <fieldset>
                <input value="<?= $row['IdArticle']?>" type="hidden" tabindex="1" name="IdArticle" id="IdArticle" readonly>
            </fieldset>
            <fieldset>
                <input value="<?= $row['IdCategorie']?>" type="text" tabindex="1" name="IdCategorieArticle" id="IdCategorieArticle" readonly>
            </fieldset>
            <fieldset>
                <input pvalue="<?= $row['NomArticle']?>" type="text"  tabindex="2" name="NomArticle" id="NomArticle" >
            </fieldset>
            <fieldset>
                <input value="<?= $row['ImageArticle']?>" type="file" tabindex="3" name="ImageArticle" accept="image/png, image/jpeg" id="ImageArticle" >
             </fieldset>
            <fieldset>
                <textarea value="<?= $row['Description']?>" tabindex="4" name="Description" id="Description" ></textarea>
            </fieldset>
            <fieldset>
                <input value="<?= $row['PrixArticle']?>" type="text" tabindex="5" name="PrixArticle" id="PrixArticle" >
            </fieldset>
            <fieldset>
                <input value="<?= $row['QuantiteArticle']?>" type="text" tabindex="6" name="QuantiteArticle" id="QuantiteArticle" >
            </fieldset>
            <fieldset>
                <button name="modifier" type="submit" id="contact-submit" >Submit</button>
            </fieldset> 
            <fieldset>           
            <button><a href="AfficherArticlesJardinageAd.php"></a>Cancel</button>
            </fieldset>           

        </form>
   
</div>
<?php
  }

}
if (isset($_POST['modifier'])){
	$Art=new articles_jardinage($_POST['IdCategorieArticle'],$_POST['NomArticle'],$_POST['ImageArticle'],$_POST['Description'],$_POST['PrixArticle'],$_POST['QuantiteArticle']);
    $ArtC-> UpdateArticle($Art,$_POST['IdArticle']);
	
	header('refresh:3 ;url=AfficherArticlesJardinageAd.php');
}
?>

</body>
</HTMl>