<?php
require_once '../bdd.php';
// Récupération de l'identifiant unique de la ligne à partir du paramètre dans l'URL
$id = !empty($_POST['id_reservation']) ? $_POST['id_reservation'] : die('Erreur: Identifiant de la réservation non trouvé.');

// Requête SQL pour supprimer les données de la réservation
$sqlQuery = "DELETE FROM reservations WHERE id_reservation = '$id'";
$stmt = $mysqlClient->prepare($sqlQuery);
$stmt->execute();

// Redirection vers la page d'accueil
header("Location: admin.php");
