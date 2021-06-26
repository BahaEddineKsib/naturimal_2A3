<?php 
require "panier.class.php";
require "C:/xampp/htdocs/Naturimal/Controller/commandeC.php";
require "C:/xampp/htdocs/Naturimal/Controller/reclamationC.php";
// echo json_encode($_SESSION['user']);

$db = getConnexion();
$panier = new panier();
$comC = new commandeC();
$recC = new reclamationC();
if (isset($_GET['add_complaint_id'])) {
  $recC->ajouter_reclamation($_GET['add_complaint_id']);
  header('location: complaint.php');

}
unset($_GET['add_complaint_id']);
$email = $_SESSION['user'];
echo $email;

?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include('HeaderClient.php');
    ?>

</head>

<body class="goto-here">
<div class="hero-wrap hero-bread" style="background-image: url('images/Botanique.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2" style="color:black"><a href="Accueil.php">Home</a></span> <span>Boutique</span></p>
                    <h1 class="mb-0 bread" style="color:black">Panier</h1>
                </div>
            </div>
        </div>
    </div>
  <!-- END nav -->

  <?php
  $ids_commandes = $comC->get_distinct_id_commande();
  if ( empty($ids_commandes)){?>
    <section class="ftco-section ftco-cart">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <div class="cart-list">
            <table class="table">
              <thead class="thead-primary">
                <tr class="text-center">
                  <th>&nbsp;</th>
                  <th>Product name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Complaints</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
      <input type="text" name="quantity" value="Listes d'achats est vide " class="quantityy form-control cart"  readonly>
                </div>
        </div>
      </div>
     
    </div>
  </section>
  <?php }
  else{
  foreach ($ids_commandes as $id_co) :
  ?>
    <section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <thead class="thead-primary">
                  <tr class="text-center">
                    <th>&nbsp;</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Complaints</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ids_produit = array();
                  $qts_produit = array();
                  $products = $comC->get_commande_afficher($email,$id_co->id_commande,"jardinage");
                  if ( !empty($products)){
                  foreach ($products as $product) {
                        if ($product->idproduit != 0) {
                            $ids_produit[$product->idproduit] = $product->idproduit;
                            $qts_produit[$product->idproduit] = $product->qtproduit;
                          }
                          $adresse = $product->adresse;
                          $fullname = $product->nom . " " . $product->prenom;
                  }
                  $current_ids = array_keys($qts_produit);
                  $purchases = $panier->product_table($db, $ids_produit,"jardinage");
                  $tot = 0;
                  foreach ($purchases as $product):
                    $tot += $product->PrixArticle * $qts_produit[$product->IdArticle];
                  ?>
                    <div class="itemsspecial">
                      <tr class="text-center">
                        <td class="image-prod">
                        <div class="img" src="images/<?= $product->ImageArticle; ?>" style="background-image:url(<?= "images/" . $product->ImageArticle; ?>);"></div>
                        </td>

                        <td class="product-name">
                          <h3><?= $product->NomArticle; ?></h3>
                          <p><?= $product->DescriptionArticle; ?></p>
                        </td>

                        <td class="productprice"><?= number_format($product->PrixArticle, 2, ',', ' '); ?> $ </td>

                        <td class="quantity">

                          <input type="number" name="quantity" class="quantityy form-control cart" value="<?= $qts_produit[$product->IdArticle]; ?>" readonly>

                        </td>
                        <td class="producttotal"><?= number_format($product->PrixArticle * $qts_produit[$product->IdArticle], 2, ',', ' '); ?> $</td>
                        <td class="product-add" title="report a complaint"><a href="purchases.php?add_complaint_id=<?= $product->IdArticle . " " . $id_co->id_commande. " "."jardinage"; ?>"><span class="btn btn-primary icon-add"></span></a></td>
                      </tr><!-- END TR-->
                    </div>
                  <?php 
                  endforeach; }

                   //   ############################ accesss ######################### 
                   $ids_produit = array();
                   $qts_produit = array();
                   $products = $comC->get_commande_afficher($email,$id_co->id_commande,"access");
                   if ( !empty($products)){
                   foreach ($products as $product) {
                         if ($product->idproduit != 0) {
                             $ids_produit[$product->idproduit] = $product->idproduit;
                             $qts_produit[$product->idproduit] = $product->qtproduit;
                           }
                           $adresse = $product->adresse;
                           $fullname = $product->nom . " " . $product->prenom;
                   }
 
                   $current_ids = array_keys($qts_produit);
                   $purchases = $panier->product_table($db, $ids_produit,"access");
                   foreach ($purchases as $product):
                     $tot += $product->prix * $qts_produit[$product->id];
                   ?>
                     <div class="itemsspecial">
                       <tr class="text-center">
                         <td class="image-prod">
                         <div class="img" src="images/<?= $product->image; ?>" style="background-image:url(<?= "images/" . $product->image; ?>);"></div>
                         </td>
 
                         <td class="product-name">
                           <h3><?= $product->nom; ?></h3>
                         </td>
 
                         <td class="productprice"><?= number_format($product->prix, 2, ',', ' '); ?> $ </td>
 
                         <td class="quantity">
 
                           <input type="number" name="quantity" class="quantityy form-control cart" value="<?= $qts_produit[$product->id]; ?>" readonly>
 
                         </td>
                         <td class="producttotal"><?= number_format($product->prix * $qts_produit[$product->id], 2, ',', ' '); ?> $</td>
                         <td class="product-add" title="report a complaint"><a href="purchases.php?add_complaint_id=<?= $product->id . " " . $id_co->id_commande. " ". "access"; ?>"><span class="btn btn-primary icon-add"></span></a></td>
                       </tr><!-- END TR-->
                     </div>
                   <?php 
                   endforeach; }
                   
                     //   ############################ aliment #########################
                   
                     $ids_produit = array();
                     $qts_produit = array();
   
                     $products = $comC->get_commande_afficher($email,$id_co->id_commande,"aliment");   
                     if ( !empty($products)){
                     foreach ($products as $product) {
                           if ($product->idproduit != 0) {
                               $ids_produit[$product->idproduit] = $product->idproduit;
                               $qts_produit[$product->idproduit] = $product->qtproduit;
                             }
                             $adresse = $product->adresse;
                             $fullname = $product->nom . " " . $product->prenom;
                     }
   
                     $current_ids = array_keys($qts_produit);
                     $purchases = $panier->product_table($db, $ids_produit,"aliment");
                     foreach ($purchases as $product):
                       $tot += $product->prix * $qts_produit[$product->id];
                     ?>
                       <div class="itemsspecial">
                         <tr class="text-center">
                           <td class="image-prod">
                           <div class="img" src="images/<?= $product->image; ?>" style="background-image:url(<?= "images/" . $product->image; ?>);"></div>
                           </td>
   
                           <td class="product-name">
                             <h3><?= $product->nom; ?></h3>
                           </td>
   
                           <td class="productprice"><?= number_format($product->prix, 2, ',', ' '); ?> $ </td>
   
                           <td class="quantity">
   
                             <input type="number" name="quantity" class="quantityy form-control cart" value="<?= $qts_produit[$product->id]; ?>" readonly>
   
                           </td>
                           <td class="producttotal"><?= number_format($product->prix * $qts_produit[$product->id], 2, ',', ' '); ?> $</td>
                           <td class="product-add" title="report a complaint"><a href="purchases.php?add_complaint_id=<?= $product->id . " " . $id_co->id_commande. " ". "aliment"; ?>"><span class="btn btn-primary icon-add"></span></a></td>
                         </tr><!-- END TR-->
                       </div>
                     <?php 
                     endforeach; }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row justify-content-end">

          <div class="col-lg-7 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
              <h3>Information : </h3>
              <p>full name : <?= $fullname ?></p>
              <p>Adress : <?= $adresse ?></p>
              <form action="#" class="info">
                <div class="form-group">
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-5 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
              <h3>Cart Total</h3>
              <hr>
              <p class="d-flex total-price">
                <span>Total</span>
                <span id="totall"><?= number_format($tot, 2, ',', ' '); ?> $ </span>
              </p>
            </div>

          </div>

        </div>
      </div>
    </section>
  <?php endforeach; }?>
  <?php include("footer.php");?>

</body>

</html>