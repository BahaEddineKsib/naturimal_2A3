<?php


//CONNECT TO DATABASE
require_once '../../view/DatabaseConnection.php';
$pdo=getConnexion ();
include_once '../../model/animal.php';

if( isset($_POST['AjouterAnimal']))
{
    if(isset($_POST['for_adoption']))
    {    $for_adoption =   "checked";}
    else{$for_adoption = "unchecked";}

    $ANIMAL = new Animal($pdo, 0, 0, $_FILES['image_link']['name'], $for_adoption, $_POST['type'], $_POST['name'], $_POST['race'], $_POST['birthday'], $_POST['gender'], $_POST['details']);
    $ANIMAL->Create($pdo);
    header("Location: ../../view/animal_dashboard/AfficherAnimal.php");
}

if( isset($_POST['ModifierAnimal']))
{
    if ($_FILES['image_link']['tmp_name'] == "" )
    {$image_link = $_POST['old_image'];}
    else{$image_link = $_FILES['image_link']['name'];}
   //echo "--location == ModifierAnimal". $_POST['id_animal'] ."--".$_POST['name']."  --".$image_link;
    if(isset($_POST['for_adoption']))
    {    $for_adoption =   "checked";}
    else{$for_adoption = "unchecked";}

    $ANIMAL = new Animal($pdo, $_POST['id_animal'], 0, $image_link, $for_adoption, $_POST['type'], $_POST['name'], $_POST['race'], $_POST['birthday'], $_POST['gender'], $_POST['details']);
    $ANIMAL->Update($pdo);
    header("Location: ../../view/animal_dashboard/AfficherAnimal.php");
}

if( isset($_POST['SupprimerAnimal']))
{
    $ANIMAL = new Animal($pdo, 0, 0, "", 0, "", "", "", "", "", "");
    $ANIMAL = $ANIMAL->getAnimalById($pdo, $_POST['id_animal']);
    $ANIMAL->Delete($pdo);
    header("Location: ../../view/animal_dashboard/AfficherAnimal.php");
}

?>