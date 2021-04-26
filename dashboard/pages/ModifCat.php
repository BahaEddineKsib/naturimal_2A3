<?php
include "C:/xampp/htdocs/GestionBotanique/Model/categorie.php";
include_once "../../config.php";
include_once "../../Controller/categorieC.php";

    if (isset($_POST['edit'])){

	$categorie=new categorie($_POST['IdCategorie'],$_POST['NomCategorie'],$_POST['Description']);
    $catC=new categorieC();
    $catC->UpdateCategorie($categorie,$_POST['edit']);
	
	header('Location: AfficherCategoriesAd.php');
}
?>