

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include("HeaderClient.php");
    ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/Botanique.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2" style="color:black"><a href="Accueil.php" >Home</a></span> <span>Boutique</span></p>
            <h1 class="mb-0 bread" style="color:black">Gestion botanique</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">All</a></li>
    					<li><a href="AfficherArticlesJardinageClient.php">Articles jardinage</a></li>
    					<li><a href="AfficherCategoriesClient.php" >Categories Articles</a></li>
    				</ul>
    			</div>
    		</div>
    	</div>
      <div >
       <font size="+2" style="margin: 50px;">La botanique est une science qui met en evidance les végétaux pour le bien etre de votre jardin
      et egalement à vous cher client, à vous de découvrir :)</font>
      </div>
    </section>
    <?php
    include("footer.php");
    ?>
    
  </body>
</html>