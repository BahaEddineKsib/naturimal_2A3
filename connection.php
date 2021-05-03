<?php


    function conn(){
    $host ='localhost';
    $username = 'root';
    $password = '';
    $database = 'tuto';

    try {
        $db = new PDO("mysql:host=$host;dbname=$database",$username,$password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
        echo " connected successfully";
    }
    catch ( PDOException $e){
        echo "connection failed : ". $e->getMessage();
    }
}


    function query($sql,$db){
        $req = $db->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
?>