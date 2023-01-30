<?php
session_start();
if (!isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_POST['email']) || !isset($_POST['pswd']))
{
	echo('Des informations sont manquantes pour le bon envoi du formulaire, veuillez réitérer');
	
	// Arrête l'exécution de PHP
    return;
}
$hashedPassword = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
try
{
	// On se connecte à MySQL
	$mysqlClient = new PDO(
	'mysql:host=localhost;dbname=neptune;charset=utf8',
	'root',
	'root');
    ini_set('display_errors', 'on');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer
// On récupère tout le contenu de la table password
$sqlQuery = 'SELECT * FROM password';
$passwordStatment = $mysqlClient->prepare('INSERT INTO password(first_name, last_name, email, pswd) VALUES(:first_name, :last_name, :email, :pswd)');
$passwordStatment->execute(array(
    'first_name'=> $_POST['first_name'],
    'last_name'=> $_POST['last_name'],
    'email'=> $_POST['email'],
    'pswd'=> $hashedPassword
));
?>
<!DOCTYPE html>
<head>
<?php include 'navbar.php';?>
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
    <p>Félicitation <?php echo $_POST['first_name']?>! Vous avez bien été inscrit sur notre site, vous pouvez dès à présent vous connecter :</p>
    <p><a href="connexion.php"><button class="btn btn-outline-primary">Se connecter</button></a></p>
</body>