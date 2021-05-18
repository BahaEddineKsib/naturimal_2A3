<?php
require_once '../../config1.php';
require_once '../../Model/Hebergements.php';
require_once '../HebergClient/HebergC.php';
$hebergC = new Hebergements();

        $Heberg = new Hebergs(

            $_POST["name"],
            $_POST["email"],
            $_POST["prix"],
            $_POST["address"],
            $_POST["description"],
            $_POST["image"]
        );
        $hebergC->AddHeberg($Heberg);


?>