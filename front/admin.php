<?php include('server.php') ;
   //if user is not logged in they can not access this page 

    if (empty($_SESSION['username'])) {
        header('location: index.html');
    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="register.css">
    <title>Home Page</title>
    <style>
        table {
            bordercollapse:collapse;
            width: 100%;
            color: black;
            font-family: monospace;
            font-size:25px;
            text-align: left;
        }
        th {
            background-color: #5f9ea0;
            color: #white;
        }
        
    </style>
</head>
<body>
    <div class="header" >
        <h2>Admin Page</h2>
    </div>

    <div class="content" >
        <?php if ( isset($_SESSION['success'])): ?>
            <div class="error success" >
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <?php if (isset($_SESSION['username'])): ?>
            <p> WELCOME <strong> <?php echo $_SESSION['username']; ?> </strong> </p>
            <p><a href="home.php?logout='1' " style="color: red;"> Log Out </a></p>
        <?php endif ?>
    </div>


    <div class ="content">
            <table>
                <tr>
                    <th>username</th>
                    <th>email</th>
                </tr>
                <?php 
                $sql = "SELECT username,email FROM users_1;";
                $result = mysqli_query($db,$sql);
                $result_check = mysqli_num_rows($result);
                if ($result_check > 0) {
                    while ($row = mysqli_fetch_assoc($result)){
                        echo  "<tr><td>".  $row ['username']  ."</td><td>".  $row ['email']  ."</td></tr>" ;
                    }
                }
            ?>
            </table>
    </div>

    


</body>
</html>