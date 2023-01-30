
<?php include 'navbar.php';?>
<!DOCTYPE html>
<head>
	<div class="content">
	<title>Hôtel Neptune</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<!--viewport=zone de la fenêtre dans laquelle le contenu web peut être vu, 
	device-width= largeur de l'écran en pixels CSS à une échelle de 100% -->
	<meta charset= UTF8>
	<link rel="stylesheet" href="Style.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<script type="text/javascript" src="bootstrap.bundle.js"></script>
	<meta name="description" content="Bienvenue sur le site de l'hôtel Neptune à Carnon 34280 (Hérault), venez découvrir notre établissement et réserver vos vacances.">
	</div>
</head>
<body>
    <div class="BoxRésérvations">
        <div class="reserve">S'inscrire</div>
        <div>
        <form action="confirmation_inscription.php" method="POST">
        <p>
            <p> Prénom <input class="champ1" type="text" name="first_name" placeholder="Freddy">
            Nom <input class="champ1" type="text" name="last_name" placeholder="Mercury"></p>
            Adresse mail
            <input class="champ1" type="email" name="email" placeholder="adresse@mail.fr">
            Mot de passe
            <input class="champ1" type="password" name="pswd" placeholder="password">
        </p>
        <input type="submit" value="Valider" class="btn btn-light">
        </div>
        </form>
    </div>
</body>