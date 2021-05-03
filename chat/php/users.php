<?php
    require "C:/xampp/htdocs/vegefoods-Copy2/panier.class.php";
    require "C:/xampp/htdocs/vegefoods-Copy2/connection.php";
    $panier = new panier();
    $db = conn();
    try{
        $req = $db->prepare('SELECT * FROM utilisateur WHERE Id_utilisateur =:id');
        $req->bindValue(':id', $_SESSION['user'][1]);
        $req->execute();
        $utilisateur = $req->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        $e->getMessage();
    }

    foreach($utilisateur as $util){
        $email = $util->Email;
    }

    try{
        $req = $db->prepare('SELECT * FROM users WHERE email =:em');
        $req->bindValue(':em', $email );
        $req->execute();
        $user = $req->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $e){
        $e->getMessage();
    }

    foreach($user as $u){
        $outgoing_id = $u->unique_id;

    }

    include_once "config.php";
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND NOT job = '0' ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>