<?php
//CONNECT TO DATABASE
require_once 'DatabaseConnection.php';
$pdo=getConnexion ();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mes Animeau</title>
</head>
<body>
<?php
require_once 'header.php';
myheader("vos animeaux");
?>
<br>
<?php
  require_once 'CRUDanimal.php';
  $ANIMAL = new Animal($pdo, 0, 0, "", 0, "", "", "", "", "", "");
  $ANIMAL->ReadAll($pdo);

?>

</body>
</html>