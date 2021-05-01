<?php
include "../core/animalerieC.php";
$AlimentC=new AlimentC();
if (isset($_POST["id"])){
    $AlimentC->supprimerAliment($_POST["id"]);
    header('Location: afficher.php');
}
?>