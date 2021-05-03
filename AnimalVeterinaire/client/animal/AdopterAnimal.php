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
require_once '../header.php';
myheader("Adoptez un nouvel ami ", "../images/adopter.jpg");
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
  if (isset($_POST['search']) && $_POST['search'] != "") {
    $ANIMAL->Search($pdo, $_POST['search']);
  }
  else
  {
    $ANIMAL->ReadAllForAdoption($pdo);
  }
  

?>
        </div>
      </div>
      <div class="col-lg-4 sidebar ftco-animate fadeInUp ftco-animated">
            <div class="sidebar-box">
              <form action="#" method="POST"  class="search-form">
                <div class="form-group">
                  <input type="submit" class="icon ion-ios-search" value="search">
                  <input type="text" name="search" class="form-control" placeholder="Search..." value="<?php   if (isset($_POST['search'])) {echo $_POST['search'];} ?>">
                </div>
              </form>
            </div>
          </div>
    </div>
  </div>
</section>
</body>
</html>