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
<?php include 'navbar.php';?>

	<div id="carousel1" class="carousel slide" data-bs-ride="false">
		<div class="carousel-indicators">
		  <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		  <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
		  <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<?php
			echo "<img src='chambre1-1.webp' class='d-block w-100' alt='Photographie Chambre'>";?>
			<div class="carousel-caption d-none d-md-block">
			<a class="ugly" href="infoChambre.php?id=1"><h5>Visitez nos chambres single ou double</h5></a>
			  <p>jusqu'à deux personnes</p>
			</div>
		  </div>
		  <div class="carousel-item">
			<img src="chambre1-2.webp" class="d-block w-100" alt="Photographie chambre">
			<div class="carousel-caption d-none d-md-block">
			  <h5>lit king size </h5>
			  <p>possibilité de rajouter un lit bébé</p>
			</div>
		  </div>
		  <div class="carousel-item">
			<img src="chambre1-3.webp" class="d-block w-100" alt="Photographie chambre">
			<div class="carousel-caption d-none d-md-block">
			  <h5>Un vrai bain de soleil</h5>
			  <p>une grande chambre de 20m<sup>2</sup></p>
			</div>
		  </div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Next</span>
		</button>
	  </div>
	  <?php	if(isset($loggedUser)):
		if($loggedUser['email'] == 'la@sauveuse.ouat'):?>
			<form action='photo.php?id=1' method="GET">
				<div class="milieu">
					<input type="submit" value="Modifier" class="btn btn-outline-primary">
				</div>
			</form>
		<?php endif; 
	   endif;?>
	  <div id="carousel2" class="carousel slide" data-bs-ride="false">
		<div class="carousel-indicators">
		  <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		  <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
		  <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<img src="chambre2-1.webp" class="d-block w-100" alt="Photographie Chambre">
			<div class="carousel-caption -none d-md-block">
			<a class="ugly" href="infoChambre.php?id=2"><h5>Chambre triple</h5></a>
			  <p>Pour 3 personnes, un lit de 140 et un de 90</p>
			</div>
		  </div>
		  <div class="carousel-item">
			<img src="chambre2-2.webp" class="d-block w-100" alt="Photographie table petit déjeuner">
			<div class="carousel-caption d-none d-md-block">
				<h5>des chambres avec vues sur la mer</h5>
			  <p>et le soleil à l'intérieur !</p>
			</div>
		  </div>
		  <div class="carousel-item">
			<img src="chambre2-3.webp" class="d-block w-100" alt="Photographie piscine">
			<div class="carousel-caption d-none d-md-block">
				<h5>Une grande chambre pour vos vacances</h5>
			  <p>Avec plus de 20m<sup>2</sup></p>
			</div>
		  </div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Next</span>
		</button>
	  </div>
	  <?php	if(isset($loggedUser)):
		if($loggedUser['email'] == 'la@sauveuse.ouat'):?>
			<form action='photo.phpid=2' method="GET">
				<div class="milieu">
					<input type="submit" value="Modifier" class="btn btn-outline-primary">
				</div>
			</form>
		<?php endif; 
	   endif;?>
	  <div id="carousel3" class="carousel slide" data-bs-ride="false">
		<div class="carousel-indicators">
		  <button type="button" data-bs-target="#carousel3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		  <button type="button" data-bs-target="#carousel3" data-bs-slide-to="1" aria-label="Slide 2"></button>
		  <button type="button" data-bs-target="#carousel3" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<img src="chambre3-1.webp" class="d-block w-100" alt="Photographie Chambre">
			<div class="carousel-caption d-none d-md-block">
			<a class="ugly" href="infoChambre.php?id=3"><h5>La plus grande de nos chambres</h5></a>
			  <p>pour des vacances en familles</p>
			</div>
		  </div>
		  <div class="carousel-item">
			<img src="chambre3-2.webp" class="d-block w-100" alt="Photographie table petit déjeuner">
			<div class="carousel-caption d-none d-md-block">
			  <h5>une grande cahmbre pour profiter en famille</h5>
			  <p>avec une capacitée de 4 personnes</p>
			</div>
		  </div>
		  <div class="carousel-item">
			<img src="chambre3-3.webp" class="d-block w-100" alt="Photographie piscine">
			<div class="carousel-caption d-none d-md-block">
			  <h5>la mer à vue d'oeil</h5>
			  <p>et le soleil toutes l'année</p>
			</div>
		  </div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carousel3" data-bs-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carousel3" data-bs-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Next</span>
		</button>
	  </div>
	  <?php	if(isset($loggedUser)):
		if($loggedUser['email'] == 'la@sauveuse.ouat'):?>
			<form action='photo.php?id=3' method="GET">
				<div class="milieu">
					<input type="submit" value="Modifier" class="btn btn-outline-primary">
				</div>
			</form>
		<?php endif; 
	   endif;?>
</body>
