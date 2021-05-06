<?php


include ("UserController.php");

$email=$_GET["Email"];

 $userC = new UtilisateurC();
     $userC->DeleteUtilisateur($email);

    header('Location: http://localhost/Projet/views/Back/users.php');

?>

<script>
    alert("Utilisateur a ete supprime")
</script>