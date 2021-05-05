<?php 
include_once "../Model/HebergClass.php";
include_once "../Controller/HebergC.php";
include_once "../Connection.php";
$Heb_Id=$_POST["Id"];
$Heberg= new Hebergements();
$list_hebergs= $Heberg->getHebergById($Heb_Id);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Hebergements">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Styling.css">
	<title><?php foreach ($list_hebergs as $hebergement):?> <?php echo $hebergement['Nom']; ?> <?php endforeach; ?></title>
	<style>
	input[type=button],
	input[type=submit] {
		background-color: #E74856;
		border: none;
		color: white;
		padding: 15px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 12px;
		margin: 4px 2px;
		cursor: pointer;
		border-radius: 12px;
	}
</style>
</head>
<body>
	<div class="card" style="width:600px;  float:right;">
		<div class="container">
			<h2>Contactez Nous!</h2>
			<form action="Mailsend.php" method="post">
				<label for="lname">Email:</label><br>
				<input type="text" id="lname" name="email"><br><br>
				<label for="lname">Subject:</label><br>
				<input type="text" id="lname" name="subject"><br><br>
				<label for="lname">Body:</label><br>
				<input type="text" id="lname" name="body" style="height:250px;width:300px;"><br><br>
				<input type="submit" value="Submit">
			</form> 


		</font>
	</div>
</div>
<?php
$i=0;
foreach ($list_hebergs as $hebergement): 
	if($i!=0)  
		break;
	$i++;?>

	<div class="card2" style="width:1000px;">
		<img src="../Model/Images/<?php echo $hebergement['Image'] ?>" alt="Hebergement" style="width:100%">
		<div class="container">
			<font color=#393e46>  
				<h2><b><?php echo $hebergement['Nom']; ?></b></h2>  
			</font>
			<font color="Black">
				<h3><?php echo $hebergement['Description']; ?></h3>
			</font>
			<font color=#00adb5>  
				<h2><b><?php echo $hebergement['Prix'];Echo "DT/Nuit" ?></b></h2>  
			</font>
		</div>
	</div>

<?php endforeach; ?>
<?php
foreach ($list_hebergs as $hebergement): ?>

	<div class="card" style="width:800px;">
		<div class="container">
			<font color=#393e46>  
				<h2><b><?php echo $hebergement['Stars']; echo ' '?><img src="star.png" width="20" height="20"> </b></h2>  
			</font>
			<font color="Gray">
				<h6><?php echo $hebergement['User']; ?></h6>
			</font>
			<font color="Gray">
				<h4><?php echo $hebergement['Comment']; ?></h4>
				<form action="Delrate.php" method="post">
					<button type="submit" name="Supprimer" value="<?php $hebergement['Heberg'] ?>" class="btn-link"><img src="delete.png" width="32" height="32"></button> 
				</form>

			</font>
		</div>
	</div>
<?php endforeach; ?>
</div>
</div>
</body>
</html> 