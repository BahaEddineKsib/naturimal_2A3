<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        include_once "../../../../config1.php";
        $db = getConnexion();
        $admin = $_SESSION['incoming_id'];
        $client =  $_SESSION['outgoing_id'];

        try{
            $req = $db->prepare('SELECT * FROM users WHERE unique_id = :id OR unique_id =:idd ');
            $req->bindValue(':id', $admin );
            $req->bindValue(':idd', $client );
            $req->execute();
            $names = $req->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            $e->getMessage();
        }

        foreach($names as $name){
            if ( $name->unique_id == $client){
                $client_name = $name->fname . " " . $name->lname;
                $email = $name->email;
            }
            if ( $name->unique_id == $admin){
                $admin_name = $name->fname . " " . $name->lname;
            }

        }


        unset($_SESSION['pdf']);
        
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                header("location: ../../Users.php");
            }
        }else{
            header("location: ../Users.php");
        }
        header("location: ../../Users.php");
    }else{  
        header("location: ../Users.php");
    }
?>