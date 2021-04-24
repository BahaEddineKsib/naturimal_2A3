<HTML> 
<body>
    <?PHP
include "C:/xampp/htdocs/GestionBotanique/Model/articles jardinage.php";

include_once "../../config.php";
include_once "../../Controller/articles jardinageC.php";

if (isset($_GET['IdArticle'])){
	$artC=new articles_jardinageC();
    $result=$artC->getCategorieById($_GET["IdArticle"]);
	foreach($result as $row){
        $IdArticle=$row['IdArticle'];
		$IdCategorie=$row['IdCategorie'];
		$NomArticle=$row['NomArticle'];
        $ImageArticle=$row['ImageArticle'];
		$Description=$row['Description'];
        $PrixArticle=$row['PrixArticle'];
        $QuantiteArticle=$row['QuantiteArticle'];

   


     
?>
<meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="control.js"> </script>
<link rel="stylesheet" href="assets/css/ajouter.css">
<div class="container">  
<form id="contact" action="ModifierArticleJardinage.php" method="post" onsubmit="return UpdateArticleJardinage();" name='registration'>
            <h3>Modifier un article de jardinage</h3>
            <h4>Modifier un article de jardinage de la base de données</h4>
            <fieldset>
                <input value="<?php echo $IdArticle;?>" type="hidden" tabindex="1" name="IdArticle" id="IdArticle" readonly>
            </fieldset>
            <fieldset>
                <input value="<?php echo $IdCategorie;?>" type="text" tabindex="1" name="IdCategorieArticle" id="IdCategorieArticle" readonly>
            </fieldset>
            <fieldset>
                <input pvalue="<?php echo $NomArticle;?>" type="text"  tabindex="2" name="NomArticle" id="NomArticle" required>
            </fieldset>
            <fieldset>
                <input value="<?php echo $ImageArticle;?>" type="file" tabindex="3" name="ImageArticle" accept="image/png, image/jpeg" id="ImageArticle" required>
             </fieldset>
            <fieldset>
                <textarea value="<?php echo $Description;?>" tabindex="4" name="Description" id="Description" required></textarea>
            </fieldset>
            <fieldset>
                <input value="<?php echo $PrixArticle;?>" type="text" tabindex="5" name="PrixArticle" id="PrixArticle" required>
            </fieldset>
            <fieldset>
                <input value="<?php echo $QuantiteArticle;?>" type="text" tabindex="6" name="QuantiteArticle" id="QuantiteArticle" required>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" >Submit</button>
            </fieldset> 
            <fieldset>           
            <button><a href="AfficherArticleAd.php"></a>Cancel</button>
            </fieldset>           

        </form>
   
</div>
<?php
  }

}
if (isset($_POST['IdArticle'])){
	$Art=new Art($_POST['IdArticle'],$_POST['IdCategorie'],$_POST['NomArticle'],$_POST['ImageArticle'],$_POST['Description'],$_POST['PrixArticle'],$_POST['QuantiteArticle']);

$ArtC-> UpdateArticle($Art,$_POST['IdArticle']);
	
	header('Location: AfficherArticlesJardinageAd.php');
}
?>

</body>
</HTMl>