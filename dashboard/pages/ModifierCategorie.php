<HTML> 
<body>
    <?PHP
include "C:/xampp/htdocs/GestionBotanique/Model/categorie.php";
include_once "../../config.php";
include_once "../../Controller/categorieC.php";
$categorieC =  new categorieC();

    if (isset($_POST['IdCategorie']) && isset($_POST['NomCategorie']) && isset($_POST['Description'])) {
        $categorie= new Album($_POST['IdCategorie'], (float)$_POST['NomCategorie'], $_POST['Description']);
        
        $categorieC->AjouterCategorie($categorie);

     
?>
<meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="control.js"> </script>
<link rel="stylesheet" href="assets/css/ajouter.css">
<div class="container">  
  <form method="post" name="ModifCat" id="ModifCat" >
  <?php
        if (isset($_GET['IdCategorie'])) {
            $result = $categorieC->getCategorieById($_GET['IdCategorie']);
			if ($result !== false) {
    ?>
    <h3>Modifier une categorie</h3>
    <h4>Modifier une categorie de la base de donnees</h4>
      <fieldset>
      <input  type="hidden" name="Id Categorie" id="Id Categorie" tabindex="1" value = "<?= $result['IdCategorie'] ?>" >
    </fieldset>
    <fieldset>
      <input  type="text" name="Nom Categorie" id="Nom Categorie" tabindex="2" value="<? $result['NomCategorie']?>" required  >
    </fieldset>
    <fieldset>
      <input type="text" name="Description" id="Description" tabindex="3" value="<? $result['Description'] ?>" >
    </fieldset>
    
      <button formaction="ModifierCategorie.php" type="submit" name="modifier" value="modifier" onclick="">Valider</button>
      <button  class="btn btn-warning" type="submit" formaction="AfficherCategoriesAd.php">Cancel</button>    
    </fieldset>
  </form>
   
</div>
<?php
  }

        }
        else 
        {
          header('location:AfficherCategoriesAd.php');
        }
      }

?>

</body>
</HTMl>