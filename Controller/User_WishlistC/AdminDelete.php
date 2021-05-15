<?php


include ("UserController.php");

$email=$_GET["Email"];

 $userC = new UtilisateurC();
     $userC->DeleteUtilisateur($email);
echo "<script>alert('Compte a ete Supprimee');
                 window.location.href='../../../views/Back/users.php'
                 </script>";
    //header('Location: ../../../views/Back/users.php');

?>

