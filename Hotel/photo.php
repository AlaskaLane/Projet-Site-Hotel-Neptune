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
<body>
<?php include 'navbar.php';
require 'bdd.php';

$id = $_GET['id'];

$sql = 'SELECT * FROM photo WHERE id_carrousel = :id';
$stmt = $mysqlClient->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute(); 
$chem_photo = $stmt->fetch();

$id = $_GET['id'];

echo "<img";