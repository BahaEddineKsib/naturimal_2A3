<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <div class ="header">
        <h2>register</h2>
    </div>
 
    <form method="post" action ="signup.php">

       
        <?php include('errors.php'); ?>
        <div class = "input-groupe">
            <label>username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>

        <div class = "input-groupe">
            <label>email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>

        <div class = "input-groupe">
            <label>password</label>
            <input type="password" name="password_1">
        </div>

        <div class = "input-groupe">
            <label>confirm password</label>
            <input type="password" name="password_2">
        </div>

        <div class = "input-groupe">
            <button type="submit" name="register" class ="btn" >Register</button>
        </div>

        <p>
            Already a member ? <a href ="login.php">Sign in</a>
        </p>

    </form>
</body>
</html>