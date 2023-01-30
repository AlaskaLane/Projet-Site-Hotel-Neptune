<?php 
$_SESSION['LOGGED_IN'] = false;
include 'cookie.php'; ?>
<!DOCTYPE html>
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
	<div>
<div class="end">
<?php include 'navbar.php';?>
		<div class="center">
		<?php if (isset($_SESSION['LOGGED_IN']) && $_SESSION['LOGGED_IN'] === true):?>
        <p class="welcome">
        Bienvenue <?php echo $loggedUser['first_name']. " ". $loggedUser['last_name'];?>
        </p>
        <?php endif;?>
        </div>
	<div class="content">
	</div>
		<form action="reservation_envoi.php" method="POST">
		<fieldset class="BoxRésérvations">
			<legend class="reserve">Réservez dès maintenant</legend>
			<div class="dates">
				<div class="Calendrier">
					<div class="text">Début du séjour
					<input class="champ" type="date" name="trip_start">
					Fin du séjour
					<input class="champ" type="date" name="trip_end">
					</div>
				</div>
			</div>
			<div class="personnes">
				<div>
					<label class="personnes" for="nbrpers">Nombre de personnes:</label>
				<input class="champ" type="number" id="nbrpers" name="nbrpers" min="0" max="10">
				</div>
			</div>
			<input type="submit" value="Valider" class="btn btn-outline-primary">
		</fieldset>
		</form>
		
	</div>
	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
		<div class="carousel-indicators">
		  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
		  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<img src="https://i0.wp.com/www.hotel-neptune.fr/wp-content/uploads/2022/03/00078-hotel-neptune-mauguio-carnon-photo-aspheries.jpg?fit=1024%2C683&ssl=1" class="d-block w-100" alt="Photographie Chambre">
			<div class="carousel-caption d-none d-md-block">
			  <h5>Visitez nos chambre</h5>
			  <p>Bla bla marketing</p>
			</div>
		  </div>
		  <div class="carousel-item">
			<img src="https://i0.wp.com/www.hotel-neptune.fr/wp-content/uploads/2022/05/NewBrand-3405-FR-carnon-petit-dejeuner-2645.jpg?ssl=1" class="d-block w-100" alt="Photographie table petit déjeuner">
			<div class="carousel-caption d-none d-md-block">
			  <h5>Prenez un petit déjeuner délicieux</h5>
			  <p>Bla Bla marketing</p>
			</div>
		  </div>
		  <div class="carousel-item">
			<img src="https://i0.wp.com/www.hotel-neptune.fr/wp-content/uploads/2022/05/00033-hotel-neptune-mauguio-carnon-photo-aspheries.jpg?ssl=1" class="d-block w-100" alt="Photographie piscine">
			<div class="carousel-caption d-none d-md-block">
			  <h5>Prenez un bain de soleil</h5>
			  <p>Avec jolie vu sur les bateaux... Eux aussi ils vous voient</p>
			</div>
		  </div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Next</span>
		</button>
	  </div>
	  	<div class="BoxRésérvations">
			<p class="reserve"> Visitez nos chambres dès maintenant</p>
			<a href="chambre.php"><button class="btn btn-outline-primary">Les chambres</button></a>
		</div>
	<div class="image">
	<img src="Logo-Neptune-The-Originals-2.png" width= 150px>
	</div>
</body>
</div>
</html>
