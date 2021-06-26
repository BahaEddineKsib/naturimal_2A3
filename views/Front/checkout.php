<?php
require 'panier.class.php' ;
$panier = new panier();

if (isset($_POST['submit'])) {
	$errors = [];
	if ( empty($_POST['state']) || empty($_POST['street']) || empty( $_POST['town']) || empty( $_POST['zip']) || empty($_SESSION['total'][1])){
		$errors['champs'] = "tous les champs sont obligatoires !";
	}
	else if ( !empty($_POST['zip'])){
		$zip = $_POST['zip'];
		echo $zip;
		if ( is_numeric($zip) != 1){
			$errors['zip'] = "le code postal/ZIP Doit contenir seuelement des chiffres !";
		}
		else if ( strlen($zip) != 4 && strlen($zip) != 5 ){
			$errors['zip'] = "le code postal/ZIP Doit contenir seulement que 4-5 chiffres !";
		}
		else {
			$state = $_POST['state'];
        	$street = $_POST['street'];
        	$town = $_POST['town'];
        	$zip = $_POST['zip'];
        	$adresse = $state . " " . $street . " " . $town . " " . $zip;
			$_SESSION['adresse'] = $adresse;
			header('location: ajoutcommande.php');
		}
	}
	else{
		header('location: ajoutcommande.php');
	}}

	$yass = 44;
	echo is_numeric($yass);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
    include('HeaderClient.php');
    ?>
  </head>
  <body class="goto-here">
		
    <!-- END nav -->
    <div class="hero-wrap hero-bread" style="background-image: url('images/Botanique.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2" style="color:black"><a href="Accueil.php">Home</a></span> <span>Boutique</span></p>
                    <h1 class="mb-0 bread" style="color:black">Checkout</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section" >
      <div class="container">
        <div class="row justify-content-center" >
          <div class="col-xl-7 ftco-animate">
						<form  action="" method="POST" >
							<h3 class="mb-4 billing-heading">Information Adresse</h3>
							<?php if(isset($errors['champs']) ){ ?>
							<p style="border: 1px solid #a94442;  color: #a94442; border-radius: 5px; text-align: center;" class="mb-4 billing-heading"><?= $errors['champs']; echo "<br>";  }?></p>
							<?php if( isset($errors['zip'])){ ?>
							<p style="border: 1px solid #a94442;  color: #a94442; border-radius: 5px; text-align: center;" class="mb-4 billing-heading"><?= $errors['zip'];  }?></p>
	          	<div class="row align-items-end">

				<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Adresse Rue</label>
	                  <input type="text" class="form-control"name="state" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Adresse rue</label>
	                  <input type="text" class="form-control" name="street" placeholder="">
	                </div>
                </div>

		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Ville</label>
	                  <input type="text" class="form-control" name="town" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Code Postal</label>
	                  <input type="text" class="form-control" name="zip" placeholder="">
	                </div>
		            </div>
	            </div>

				<div class="cart-detail p-3 p-md-4">
				<input  type="submit" value="place order" name="submit" class="btn btn-primary py-3 px-4"></input>
				</div>
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Total Panier</h3>
	          			<p class="d-flex">
		    						
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span><?= $_SESSION['total'][1]; ?> $</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Moyen de paiement</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> lors du livraison</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> j'accepte tous les terms et conditions</label>
											</div>
										</div>
									</div>
								</div>
								
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
    
  
    <?php include("footer.php");?>

  </body>
</html>