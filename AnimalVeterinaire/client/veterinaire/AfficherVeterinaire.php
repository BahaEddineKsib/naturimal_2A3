<?php
//CONNECT TO DATABASE
require_once '../animal/DatabaseConnection.php';
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
require_once '../header.php';
myheader("veterinaire", "../images/veterinary.jpg");
?>
<br>
<?php
  require_once 'CRUDveterinaire.php';
  $VETERINAIRE = new Veterinary($pdo, 0, "image_link", "name", "email", "address", "details");//($pdo, $id, $image_link, $name, $email, $address, $details)
?>
  <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate fadeInUp ftco-animated">
            <?php $VETERINAIRE->ReadAll($pdo, 1); ?>
          </div>
          </div>
          </div>
          </section>

</body>
</html>