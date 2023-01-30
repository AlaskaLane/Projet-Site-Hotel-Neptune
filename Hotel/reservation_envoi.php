<!DOCTYPE html>
<?php
include 'session.php';
if(isset($_SESSION['LOGGED_IN'])):
if (!isset($_POST['trip_start']) || !isset($_POST['trip_start']))
{
	echo('Il faut des dates pour soumettre le formulaire.');
	
	// Arrête l'exécution de PHP
    return;
}
elseif (!isset($loggedUser['email']))
{
    echo ("Vous devez vous connecter pour effectuer une réservation.");
}

// Si tout va bien, on peut continuer
$time = strtotime($_POST['trip_start']);
$date = date('d\m\Y', $time);
// On récupère tout le contenu de la table password
$sqlQuery = 'SELECT * FROM reservations';
$reservationStatment = $mysqlClient->prepare('INSERT INTO reservations(trip_start, trip_end, nbrpers, email_client) VALUES(:trip_start, :trip_end, :nbrpers, :email_client)');
$reservationStatment->execute(array(
    'trip_start'=> $_POST['trip_start'],
    'trip_end'=> $_POST['trip_end'],
    'nbrpers'=> $_POST['nbrpers'],
    'email_client'=> $loggedUser['email']
));
$reservations = $reservationStatment->fetchAll();
?>
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
	<div class="content">
     <div class="resbox">
        <p>
          <strong>Nombre de personnes : </strong> <?php echo htmlspecialchars($_POST['nbrpers']);?>
        </p>
        <p>
        <strong>Date de début : </strong> <?php echo htmlspecialchars($_POST['trip_start']);?>
        </p>
        <p>
        <strong>Fin du séjour : </strong> <?php echo htmlspecialchars($_POST['trip_end']);?>
        </p>
     </div>
    </div>
</body>
</html>
<?php
else:
    include 'navbar.php';?>
	<div class="content">
     <div class="resbox">
        <p>
            Vous ne pouvez pas effectuer de réservations si vous n'êtes pas connecté
        </p>
        <a href="connexion.php"><button class="btn btn-outline-primary">Se connecter</button></a>
        </div>
    </div>
    </body>
</html>
<?php
endif;?>
