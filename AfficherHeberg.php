<?php 
include_once "../Model/HebergClass.php";
include_once "../Controller/HebergC.php";
include_once "../Connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Hebergements">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Styling.css">
	<title>Les Hebergements</title>
</head>
<body>
	<div class="topnav">
		<a class="active" href="#home">Home</a>
		<a href="#about">About</a>
		<a href="#contact">Contact</a>
		<div class="search-container">
			<form action="CherchHeberg.php" method="post">
				<input type="text" placeholder="Search.." name="search">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>
	<?php
	$Heberg= new Hebergements();
	$list_hebergs= $Heberg->AfficherHeberg();
	foreach ($list_hebergs as $hebergement): ?>
		<div class="row">
			<div class="column">
				<div class="card">
					<img src="../Model/Images/<?php echo $hebergement['Image'] ?>" alt="Hebergement" style="width:100%">
					<div class="container">
						<form action="Hebergement.php" method="post">
							<button type="submit" name="Id" value="<?php echo $hebergement['Id'] ?>" class="btn-link"><?php echo $hebergement['Nom'] ?></button>
						</form>
						<font color="Gray">
							<p><?php echo substr($hebergement['Description'],0,70);echo "..."; ?></p>
						</font>
						<font color=#00adb5>  
							<h2><b><?php echo $hebergement['Prix'];Echo "DT" ?></b></h2>  
						</font>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</body>
</html> 
