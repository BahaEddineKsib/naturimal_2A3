<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'naturimal';

    try {
        $pdo = new PDO (
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        ]
        );
      //  echo"Connnected Successfully";
    }
    catch(PDOExeption $e){
                echo"Connnected Failed : ". $e->getMEssage();

    }


?>