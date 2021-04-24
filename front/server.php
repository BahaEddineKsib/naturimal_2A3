<?php
    session_start();
    $username = "";
    $email = "";
    $errors = array();

 // connect to the database

    $db = mysqli_connect('localhost','root','','registration');

    //if the register button is clicked 

    if (isset($_POST['register'])){

        // to ensure a unique username
        $username = mysqli_real_escape_string($db,$_POST['username']);

        $check_duplicate_username = "SELECT username FROM users WHERE username= '$username' ";
        $result_username = mysqli_query($db,$check_duplicate_username);
        $count_username = mysqli_num_rows($result_username);

        if ($count_username > 0) {
            array_push($errors,"username exist already !");
        }
        
        // to ensure a unique email
        $email = mysqli_real_escape_string($db,$_POST['email']);

        $check_duplicate_email = "SELECT email FROM users WHERE email= '$email' ";
        $result_email = mysqli_query($db,$check_duplicate_email);
        $count_email = mysqli_num_rows($result_email);

        if ($count_email > 0) {
            array_push($errors,"email exists already !");
        }


        $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

        //ensure that the form fields are filled properly
        if ( empty($username)){
            array_push($errors,"username is required");
        }
        if ( empty($email)){
            array_push($errors,"email is required");
        }
        if ( empty($password_1)){
            array_push($errors,"password is required");
        }

        if ($password_1 != $password_2){
            array_push($errors,"password doesn't match");
        }

        if (count($errors) == 0) {
            $password = md5($password_1);
            $sql = "INSERT INTO users (username, email, password) VALUES('$username','$email','$password')";
            mysqli_query($db,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "log in successful ";
            header('location: home.php'); // redirect to home page
        }
    }

    // log user in from page

    if ( isset($_POST['login'])){
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = mysqli_real_escape_string($db,$_POST['password']);

        //ensure that the form fields are filled properly
        if ( empty($username)){
            array_push($errors,"username is required");
        }
        if ( empty($password)){
            array_push($errors,"password is required");
        }

        if(count($errors)== 0){
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username= '$username' AND password='$password' ";
            $result = mysqli_query($db,$query);
            if ( mysqli_num_rows($result) == 1){
                // log user in
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "log in successful ";
            
                header('location: client.php'); // redirect to home page
                
            }
            else {
                array_push($errors, " the username/password doesn't exist. ");
            }
        }
    }

    // log out

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.html');
    }
?>