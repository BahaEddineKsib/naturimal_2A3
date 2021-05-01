<?php

if (

    isset($_POST["nom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["sujet"]) &&
    isset($_POST["message"])

) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["sujet"]) &&
        !empty($_POST["message"])
    ) {
        $email = $_POST["email"];
        $subject = $_POST["sujet"];
        mail("$email" , "$email ($subject)" , $_POST["message"] , "From: $email");
    } else
        echo "Missing information";
}

?>