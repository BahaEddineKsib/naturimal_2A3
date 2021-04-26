

<HTML> 

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modifier categorie</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<?PHP
include "C:/xampp/htdocs/GestionBotanique/Model/categorie.php";
include_once "../../config.php";
include_once "../../Controller/categorieC.php";

if (isset($_GET['edit'])){
	$catC=new categorieC();
    $result=$catC->getCategorieById($_GET['edit']);
	foreach($result as $row){
?>
 

            </nav>
    </aside><!-- /#left-panel -->


                <div class="container">
                    <div class="jumbotron">
<form method="POST">
<table>
<caption>Modifier Categorie</caption>
<tr>
<td>Id categorie:</td>
<td><input readonly type="number" name="id" value="<?= $row['IdCategorie']  ?>"></td>
</tr>
<tr>
<td>Nom categorie:</td>
<td><input type="text" name="nom" value="<?= $row['NomCategorie'] ?>"></td>
</tr>
<tr>
<td>Description:</td>
<td><input type="text" name="description" value="<?= $row['Description'] ?>"></td>
</tr>

                       

<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['edit'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
else {echo "verifier";}
if (isset($_POST['modifier'])){
	$cat=new categorie($_POST['nom'],$_POST['description']);
	$catC-> UpdateCategorie($cat,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location:AfficherCategoriesAd.php');
}
?>
</body>
</HTMl>