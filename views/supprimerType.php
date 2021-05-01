<?php
include "../core/animalerieC.php";
$typeC=new TypeC();
if (isset($_POST["id_type"])){
    $typeC->supprimerType($_POST["id_type"]);
    header('Location: afficher.php');
}
?>