

<HTML> 

<head>
    <meta charset="utf-8">
    <title>Modifer categorie</title>
</head>
<body>
<?PHP
include "C:/xampp/htdocs/GestionBotanique/Model/categorie.php";
include_once "../../config.php";
include_once "../../Controller/categorieC.php";

if (isset($_GET['IdCategorie'])){
	$catC=new categorieC();
    $result=$catC->getCategorieById($_GET['IdCategorie']);
	foreach($result as $row){ //ok
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
            <h3>Modifier une categorie</h3>
            <h4>Modifier une categorie de la base de données</h4>
            <fieldset>
                <input value="<?= $row['IdCategorie']?>" type="text" tabindex="1" name="IdCategorieArticle" id="IdCategorieArticle" readonly>
            </fieldset>
            <fieldset>
                <input value="<?= $row['NomCategorie']?>" type="text" tabindex="2" name="NomCategorie" id="NomCategoie">
            </fieldset>            
            <fieldset>
                <textarea value="<?= $row['Description']?>" tabindex="3" name="Description" id="Description" ></textarea>
            </fieldset>
            <fieldset>
                <button name="modifier" type="submit" id="contact-submit" >Submit</button>
            </fieldset> 
            <fieldset>           
            <button><a href="AfficherArticlesJardinageAd.php"></a>Cancel</button>
            </fieldset>           

        </form>
   
</div>
<?PHP
	}
}
else {echo "verifier";}
if (isset($_POST['modifier'])){
	$cat=new categorie($_POST['NomCategorie'],$_POST['Description']);
	$catC-> UpdateCategorie($cat,$_POST['IdCategorie']);
	//echo $_POST['id_ini'];
	header('refresh:3 ; url=AfficherCategoriesAd.php');
}
?>
</body>
</HTMl>