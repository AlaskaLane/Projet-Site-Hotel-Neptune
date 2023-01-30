<?php
//connexion.php
// Activation de l'affichage des erreurs PHP
error_reporting(E_ALL);
ini_set('display_errors', 'on');

include 'cookie.php';
include 'navbar.php';


// Récupération de la variable de session 'error' s'il y en a une
$errorMessage = !empty($_SESSION['error']) ?  !empty($_SESSION['error']) : NULL;


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hôtel Neptune</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<!--viewport=zone de la fenêtre dans laquelle le contenu web peut être vu, 
		device-width= largeur de l'écran en pixels CSS à une échelle de 100% -->
		<meta charset= UTF8>
		<link rel="stylesheet" href="Style.css">
		<link rel="stylesheet" href="bootstrap.min.css">
		<script type="text/javascript" src="bootstrap.bundle.js"></script>
		<meta name="description" content="Bienvenue sur le site de l'hôtel Neptune à Carnon 34280 (Hérault), venez découvrir notre établissement et réserver vos vacances.">
	</head>
	<body>
		<div class="BoxRésérvations">
			<div class="reserve">Se connecter</div>
			<form action="verification.php" method="POST">
				 <?php 
				  if($errorMessage) {
					echo '<div class="alert alert-danger" role="alert">';
					echo $_SESSION['error']; 
					echo "</div>";
				  }
				?>
				<p>
				  Adresse mail
				  <input class="champ1" type="email" name="email" placeholder="***@***">
				  Mot de passe
				  <input class="champ1" type="password" name="pswd" placeholder="password">
				</p>
				<input type="submit" value="Valider" class="btn btn-light">
			</form>

			<div class="content">
			</div>
			<div class="BoxRésérvations">
				<div>
				<p class="reserve"> Pas encore de compte?</p>
				<a href="inscription.php"><button class="btn btn-light">S'inscrire</button><a>
			</div>
			</div>
		</div>
	</body>
</html>