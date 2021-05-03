<?php
include_once "../Model/RatingClass.php";
include_once "../Controller/RatingC.php";
include_once "../Connection.php";

$rating=new Ratingc();

if(isset($_POST['Supprimer']))
{
  $heb=$_POST['Supprimer'];
  $rating-> DeleteRating($heb);
  echo "Nice";

}

?>