<?php


include ("WishlistC.php");

$email=$_GET["Email"];
$ID=$_GET["ID"];

            echo $email;
            echo $ID;
	$wishlist = new WishlistC();

	$wishlist->SupprimerProduitWish($email,$ID);

           echo "<script>
		 window.location.href='http://localhost/Projet/views/Front/Wishlist.php'
		 alert('Produit ete supprimer de votre wishlist');
		 </script>";


?>