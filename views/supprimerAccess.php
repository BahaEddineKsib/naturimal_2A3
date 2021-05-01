<?php
include "../core/animalerieC.php";
$AccessC=new AccessC();
if (isset($_POST["id"])){
    $AccessC->supprimerAccess($_POST["id"]);
    header('Location: afficher.php');
}
?>