<?php
include "C:/xampp/htdocs/GestionBotanique/Model/categorie.php";

  include_once "../../config.php";
  include_once "../../Controller/categorieC.php";
  
  $cat=new categorieC();

if(isset($_GET['IdCategorie']))
{
    $id=$_GET['IdCategorie'];
    $cat-> DeleteCategorie($id);
    echo "succeeeesssss supprimer";
   header('Location: AfficherCategoriesAd.php');

}
header("refresh:1;url=AfficherCategoriesAd.php");
?>