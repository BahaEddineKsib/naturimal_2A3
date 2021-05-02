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
myheader("Adoptez un nouvel ami ", "images/adopter.jpg");
?>
<br>
<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate fadeInUp ftco-animated">
						<div class="row">
<?php
  require_once 'CRUDanimal.php';
  $ANIMAL = new Animal($pdo, 0, 0, "", 0, "", "", "", "", "", "");
  $ANIMAL->ReadAllForAdoption($pdo);

?>
        </div>
      </div>
      <div class="col-lg-4 sidebar ftco-animate fadeInUp ftco-animated">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" class="form-control" placeholder="Search...">
                </div>
              </form>
            </div>
          </div>
    </div>
  </div>
</section>
</body>
</html>