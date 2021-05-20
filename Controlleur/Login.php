<?php

include("../Model/UserModel.php");
include("UserController.php");

$error = "";
// create user
$user = new Utilisateur();
// create an instance of the controller

$userC = new UtilisateurC();
    if (isset($_POST["Email"]) && isset($_POST["Password"]) ) {
    // collect value of input field
        $user->setEmail($_POST['Email']);
        $user->setPassword($_POST['Password']);
        //$user->FirstName=$_POST['Nom'];

        
    }
    else
        $error = "Missing information";

        
        $userC->ChercherUtilisateur($user);
                      session_start();

                    if($_SESSION["newsession"] == "Admin@Admin.com")
                    {
                                header('Location: http://firstpage/Projet/dashboard/pages/dashboard');

                    }
                    else{
                     header('Location: http://firstpage/Projet/');

                    }
                        echo $_SESSION["newsession"];


?>