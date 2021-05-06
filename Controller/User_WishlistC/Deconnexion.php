<?php


    session_start();
    unset($_SESSION["user"]);
    header('Location: http://localhost/Projet/views/Front/Accueil.php');
?>