<?php


//CONNECT TO DATABASE
require_once '../../client/animal/DatabaseConnection.php';
$pdo=getConnexion ();
include_once '../../classes/veterinaire.php';

if( isset($_POST['AjouterVeterinaire']))
{
    $VETERINAIRE = new Veterinary($pdo, 0, $_FILES['image_link']['name'], $_POST['name'], $_POST['email'], $_POST['address'], $_POST['details']);
    $VETERINAIRE->Create($pdo);
    include_once 'AfficherVeterinaire.php';
}

if( isset($_POST['ModifierVeterinaire']))
{
    if ($_FILES['image_link']['tmp_name'] == "" )
    {$image_link = $_POST['old_image'];}
    else{$image_link = $_FILES['image_link']['name'];}

    $VETERINAIRE = new Veterinary($pdo, $_POST['id_veterinary'], $image_link, $_POST['name'], $_POST['email'], $_POST['address'], $_POST['details']);
    $VETERINAIRE->Update($pdo);
    include 'AfficherVeterinaire.php';
}

if( isset($_POST['SupprimerVeterinaire']))
{
    $VETERINAIRE = new Veterinary($pdo, 0, "", "", "", "", "");
    $VETERINAIRE = $VETERINAIRE->getVeterinaryById($pdo, $_POST['id_veterinary']);
    $VETERINAIRE->Delete($pdo);
    include 'AfficherVeterinaire.php';
}

?>